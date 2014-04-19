<?php

// These are all a little bit ghetto and not very MVC-ish. That's okay for now!
class Page {

	private $page;

	function __construct($custom = "") {
		empty($custom) ? $this->loadPage($_GET['page']) : $this->loadPage($custom);
	}

	public function getPageName($ucfirst = false) {
		return $ucfirst ? ucfirst($this->page) : $this->page;
	}

	// Figure out which page is being loaded. Try to load it.
	private function loadPage($page) {

		// Sanitize
		$page = htmlentities($page, ENT_QUOTES);
		if(empty($page)) {
			$page = 'home';
		}
		$this->page = strtolower($page);
	}

	// Attempt to load a page-specific version of this section. If none exists, use default.
	public function getSection($section, $pageOverride = "") {

		$usePage = empty($pageOverride) ? $this->page : $pageOverride;
		$path = realpath(dirname(__FILE__)) . '/sections/' . $section . '/' . $usePage . '.php';
		if(file_exists($path)) {
			include($path);
		} else {
			$path = realpath(dirname(__FILE__)) . '/sections/' . $section . '/default.php';
			if(file_exists($path)) {
				include($path);
			} else {
				throw new Exception('Could not load section ' . $section . ' at path ' . $path);
			}
		}
	}

	// Temporary. Something better will come later...
	public function getRootURL() {
		return 'http://localhost:8888/linuxTuts';
	}
}
?>