<?php

	$rootUrl = $this->getRootUrl();

	// Top Nav Items
	$items = array(
			'Home' => $rootUrl . '/',
			'Reference' => $rootUrl . '/reference',
			'Lessons' => $rootUrl . '/lessons',
			'Activities' => $rootUrl . '/activities',
			'About' => $rootUrl . '/about'
		);
?>
<nav>
	<span id="topLogo">LT</span>
	<ul>
	<?php
		$page = $this->getPageName();
		foreach($items as $name => $link) {
			$class = ($page === strtolower($name)) ? 'class="active"' : '';
			echo "<li $class><a href=\"$link\" $class>$name</a></li>";
		}
	?>
	</ul>
	<div id="search">
		<form name="siteSearch" id="siteSearch">
			<input type="text" name="searchInput" id="searchInput/">
		</form>
	</div>
</nav>