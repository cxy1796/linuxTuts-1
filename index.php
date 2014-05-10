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
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lemon' rel='stylesheet' type='text/css'>
	<!-- added by andrew -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <!-- Bootstrap -->  
    <link rel=”stylesheet” href=”css/bootstrap.css”  type=”text/css”/>
	<!-- end of add -->
	<?php echo $page->getSection('css'); ?>
</head>
<body>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<div class="content">
	<header id="siteHeader">
		<?php echo $page->getSection('nav'); ?>
	</header>
	<?php echo $page->getSection('content'); ?>
	<footer>
		<div id="footerContainer">
			<?php echo $page->getSection('footer'); ?>
		</div>
	</footer>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" language="javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
	<script src="<?php echo $page->getRootURL(); ?>/static/scripts/svgeezy/svgeezy.min.js"></script>
	<script>
        svgeezy.init('svgonly', 'png');
    </script>
    <script>
	$(document).ready(function() {
		$('#commands').dataTable({
			"bFilter": true
		});
	} );
</script>
</div>
</body>
</html>