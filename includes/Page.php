<?php

// These are all a little bit ghetto and not very MVC-ish. That's okay for now!
class Page {

	private $page;
	private $pagePath = array();

	function __construct($custom = "") {
		require('config.php');
		empty($custom) ? $this->loadPage($_GET['page']) : $this->loadPage($custom);
	}

	public function getPageName($ucfirst = false) {
		return $ucfirst ? ucfirst($this->page) : $this->page;
	}

	public function getPagePath() {
		return $this->pagePath;
	}

	// Basically just a shortcut to grab the highest level path item
	public function getSectionName() {
		return empty($this->pagePath) ? null : $this->pagePath[0];
	}

	// Figure out which page is being loaded. Try to load it.
	private function loadPage($page) {

		// Sanitize
		$page = htmlentities($page, ENT_QUOTES);
		if(empty($page)) {
			$page = 'home';
		}

		// Parse the path. This page could be deep in the hierarchy. Parse the slashes!
		$path = strtolower($page);
		$path = explode('/', $path);

		// Eliminate last element if it's empty
		$pathSize = count($path);
		if($pathSize > 1 AND empty($path[$pathSize])) {
			array_pop($path);
		}

		$page = end($path);
		$this->page = $page;
		$this->pagePath = $path;
	}

	// Attempt to load a page-specific version of this section. If none exists, use default.
	public function getSection($section, $pageOverride = "") {

		$usePage = empty($pageOverride) ? $this->page : $pageOverride;

		// Work with deeper nested content correctly.
		// For now, deep content will just rely on the parent "section" for most of its assets.
		if(count($this->pagePath) > 1 AND $section === 'content' AND $this->pagePath[0] !== 'admin') {
			$section = $section . '/' . $this->getSectionName();
		}

		error_log('pagepath: ' . var_export($this->pagePath,true));
		error_log('section: ' . var_export($section,true) . '       ' . $this->getSectionName());
		if($this->pagePath[0] === 'admin' AND $section === 'content') {
			//$path = realpath(dirname(__FILE__)) . '/sections/admin/' . $usePage . '.php';
			$section = 'admin';
			//$usePage = empty($this->pagePath) ? '' : $this->pagePath[];
		}

		$path = realpath(dirname(__FILE__)) . '/sections/' . $section . '/' . $usePage . '.php';

		if(file_exists($path)) {
			include($path);
		} else {
			error_log('Could not load section \'' . $section . '\' at path ' . $path . '. Attempting another path...');
			$path = realpath(dirname(__FILE__)) . '/sections/' . $section . '/default.php';
			if(file_exists($path)) {
				error_log('Okay, found it! :)  File found at ' . $path);
				include($path);
			} else {
				throw new Exception('Could not load section \'' . $section . '\' at path ' . $path);
			}
		}
	}

	// Temporary. Something better will come later...
	public function getRootURL() {
		return ROOT_URL;
	}

	public function generateBreadcrumbs() {
		$output = '<ul>';
		$crumbs = $this->getPagePath();
		foreach($crumbs as $key=>$crumb) {
			$name = str_replace('-', ' ', $crumb);
			$name = ucwords($name);

			$linkPathChunks = array_slice($crumbs, 0, $key+1);
			$link = $this->getRootURL() . implode('/', $linkPathChunks);
			$output .= '<a href="'.$link .'/"><li>' . $name . '</li></a>
			<li class="arrow">&rsaquo;</li>';
		}
		$output = rtrim($output, '<li class="arrow">&rsaquo;</li>');
		$output .= '</ul>';
		return $output;
	}

	public function getDBHandler() {
		try {
			$dsn = ('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME);
			return new PDO($dsn, DB_USER, DB_PASS);
		}
		catch (PDOException $e)  {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}
?>