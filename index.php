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
	<?php echo $page->getSection('content'); ?>
	<footer>
		<div id="footerContainer">
			<?php echo $page->getSection('footer'); ?>
		</div>
	</footer>
</body>
</html>