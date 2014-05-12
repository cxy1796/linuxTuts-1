<?php
	// Get main content
	$pageName = $this->getPageName(); // Grab now to reduce method calls later
	$db = $this->getDBHandler();
	$query = $db->prepare("SELECT * from activities where webname = :webname");
	$query->bindParam(':webname', $this->getPageName());
	$query->execute();
	$activity = $query->fetch(PDO::FETCH_ASSOC);

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
	}, $activity['content']);

?>
<div class="container narrow">
	<h2><?php echo $activity['name']; ?></h2>
	<nav class="breadcrumbs">
		<?php echo $this->generateBreadcrumbs(); ?>
	</nav>

	<div class="legible">
		<?php echo $content; ?>
	</div>
	<div class="sideNav">
		<?php
		if(count($sectionAnchors > 0)) {?>
			<h2>Sections</h2>
			<ul>
				<?php
					foreach($sectionAnchors as $item) {
						echo "<li>$item</li>\n";
					}
				?>
			</ul>
		<?php } ?>
	</div>

	<nav class="breadcrumbs">
		<?php echo $this->generateBreadcrumbs(); ?>
	</nav>

</div>