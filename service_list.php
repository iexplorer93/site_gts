<?php include'connect.php';
$res = mysql_fetch_array(mysql_query("SELECT * FROM pages WHERE id=3;"));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title><?php echo $res['title'];?></title>
	<meta name="keywords" content="<?php echo $res['meta_k'];?><" />
	<meta name="description" content="<?php echo $res['meta_k'];?>" />
	<link href="style.css" rel="stylesheet">

</head>

<body>
<div id="topMenu">
	<div id="menu">
		<?php include 'bloks/menu.php'; ?>
	</div>
</div>

<div class="wrapper">

	<header class="header">
		<div id="menu2">
			<?php include 'bloks/menu2.php'; ?>
		</div>

		<div id="slider">
			<strong>здесь будет слайдер</strong>
		</div>
	</header><!-- .header-->

	<div class="middle">

		<div class="container">
			<main class="content">
				<div class="content_main">
					<h2><?php echo $res['title'];?></h2>
					<div id="text">
						<?php echo $res['description'];?>
					</div>
				</div>
			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="left-sidebar">
			<div id="navL">
				<h1 id="h1">Навигация</h1>
				<?php include './bloks/nav.php';?>
			</div>
		</aside><!-- .left-sidebar -->

		<aside class="right-sidebar">
			<?php include './bloks/search.php';
                        
                        include './bloks/lastnews.php';
                        
                        include './bloks/tags.php';
                        
                        include './bloks/ad.php';
                        ?>
		</aside><!-- .right-sidebar -->

	</div><!-- .middle-->

</div><!-- .wrapper -->

<?php include'bloks/footer.php'; ?>

</body>
</html>