<?php
	include('./includes/Page.php');
	$page = new Page();
?>

<!DOCTYPE html>
<head>
	<title>Linux Tutorials - <?php echo $page->getPageName(true); ?></title>
	<meta charset="utf-8">
	<meta name="description" content="Linux Tutorials">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'/>
	<?php echo $page->getSection('css'); ?>
</head>
<body>
	<header id="siteHeader">
		<?php echo $page->getSection('nav'); ?>
		<div id="largeLogo">
			<h1><span class="logoLinux">Linux</span><span class="logoTuts">Tuts</span></h1>
		</div>
	</header>
	<div class="container" style="text-align: center;">
		<section id="sections">
			<div class="section">
				This is some text and maybe a small graphic that describes a site section. Click me!
			</div>
			<div class="divider"><div>&nbsp;</div></div>
			<div class="section">
				This is some text and maybe a small graphic that describes a site section. Click me!
			</div>
			<div class="divider"><div>&nbsp;</div></div>
			<div class="section">
				This is some text and maybe a small graphic that describes a site section. Click me!
			</div>
		</section>
		<div id="bigSearch">
					<h2 style="font-size: inherit;">Search for a Linux Command:</h2>
					<form name="siteSearch" id="siteSearch">
						<input type="text" name="searchInput" id="searchInput/">
						<button>Search</button>
					</form>
					or <a href="reference.html">view entire command reference.</a>
				</div>
		</div>
	<footer>
		<div id="footerContainer">
			<a href="#">Home</a> | 
			<a href="#">About</a> | 
			<a href="#">Contact</a>
		</div>
	</footer>
</body>
</html>