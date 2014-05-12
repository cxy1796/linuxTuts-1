<?php
	// Get main content
	$pageName = $this->getPageName(); // Grab now to reduce method calls later
	$db = $this->getDBHandler();
	$query = $db->prepare("SELECT * from lessons where webname = :webname");
	$query->bindParam(':webname', $this->getPageName());
	$query->execute();
	$lesson = $query->fetch(PDO::FETCH_ASSOC);

	// Look for a previous/next lessons
	$query = $db->prepare("select webname, section, `order` from lessons order by section, `order`");
	$query->execute();
	$lessonSequence = $query->fetchAll(PDO::FETCH_ASSOC);
	// Find the current item
	foreach($lessonSequence as $i => &$item) {
		if($item['webname'] === $pageName) {

			// Previous link is the item before this one in the array
			if($i != 0) {
				$previousLesson = $lessonSequence[$i-1];
			}

			// And the next link is the item after this one
			if(isset($lessonSequence[$i+1])) {
				$nextLesson = $lessonSequence[$i+1];
			}

			// No need to keep going and waste CPU cycles
			break;
		}
	}

	// Extract the contents of all <h3> tags and use them to build the page-level navigation
	// Tiny bit hacky, but it works!
	$sectionAnchors = array();
	global $sectionAnchors;

	// Inject the bookmark anchors into the DOM
	$content = preg_replace_callback("/<[Hh]{1}3(?:.*)>(.*?)<\/[Hh]{1}3>/", function($matches) {
		global $sectionAnchors;
		$anchor = '<a name="section_' . count($sectionAnchors) . '"></a>' . $matches[0];
		$sectionAnchors[] = '<a href="#section_' . count($sectionAnchors) . '">'.$matches[1].'</a>';
		return $anchor;
	}, $lesson['content']);

?>
<div class="container narrow">
	<h2><?php echo $lesson['name']; ?></h2>
	<nav class="breadcrumbs">
		<?php echo $this->generateBreadcrumbs(); ?>
	</nav>
	<h3>Section <?php echo $lesson['section']; ?>, Lesson <?php echo $lesson['order']; ?></h3>

	<div class="legible">
		<?php echo $content; ?>
	</div>
	<div class="sideNav">
		<?php
		if(count($sectionAnchors > 0)) {?>
			<h2>Lesson Plan</h2>
			<ul>
				<?php
					foreach($sectionAnchors as $item) {
						echo "<li>$item</li>\n";
					}
				?>
			</ul>
		<?php } ?>
	</div>

	<nav class="sequence breadcrumbs" style="clear: both;">
		<ul>
			<?php echo isset($previousLesson) ? '<a href="' . $this->getRootURL() . 'lessons/' . $previousLesson['webname'] . '/"><li>Previous Lesson</li></a>' : ''; ?>
			<?php echo isset($nextLesson) ? '<a href="' . $this->getRootURL() . 'lessons/' . $nextLesson['webname'] . '/"><li>Next Lesson</li></a>' : ''; ?>
		</ul>
	</nav>

	<nav class="breadcrumbs">
		<?php echo $this->generateBreadcrumbs(); ?>
	</nav>

</div>