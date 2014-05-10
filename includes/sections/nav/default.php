<?php

	$rootUrl = $this->getRootUrl();

	// Top Nav Items
	$items = array(
			// 'Home' => $rootUrl,
			'Reference' => $rootUrl . 'reference/',
			'Lessons' => $rootUrl . 'lessons/',
			'Activities' => $rootUrl . 'activities/',
			'About' => $rootUrl . 'about/'
		);
?>
<nav>
	<!-- <span id="topLogo">LT</span> -->
	<ul>
		<li id="topLogo"><span><a href="<?php echo $this->getRootUrl(); ?>">LT</a></span></li>
	<?php
		$page = $this->getSectionName();
		foreach($items as $name => $link) {
			$class = ($page === strtolower($name)) ? 'class="active"' : '';
			echo "<li $class><a href=\"$link\" $class>$name</a></li>";
		}
	?>
	</ul>
	<div id="search">

		<form name="siteSearch" role="search" id="siteSearch">
				<input type="text" class="form-control" placeholder="Search..." name="searchInput" id="searchInput/">			
			<!--<button>Search</button>-->
		</form>
	</div>
</nav>
