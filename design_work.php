<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
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

				</div>
			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="left-sidebar">
			<div id="navL">
				<h1 id="h1">Навигация</h1>
				<ul id="items">
					<li><img src="img/1.png"><span><a href="link.php">Связь</a> <p>9 комментариев</p></span></li>
					<li><img src="img/2.png"><span><a href="automation.php" >Промышленная Автоматизация</a><p> 9 комментариев</p></span></li>
					<li><img src="img/3.png"><span><a href="#" >Проектные работы</a><p> 9 комментариев</p></span></li>
					<li><img src="img/4.png"><span><a href="#" >Телекоммуникации</a><p> 9 комментариев</p></span></li>
				</ul>
			</div>
		</aside><!-- .left-sidebar -->

		<aside class="right-sidebar">
			<div id="navR"><h1 id="h1">Поиск</h1>
				<form id="search" action="">
					<input type="text">
				</form>
			</div>
			<div id="navR"><h1 id="h1">Последние новости</h1></div>
			<div id="navR"><h1 id="h1">#Теги</h1></div>
			<div id="navR"><h1 id="h1">Реклама</h1></div>
		</aside><!-- .right-sidebar -->

	</div><!-- .middle-->

</div><!-- .wrapper -->

<?php include'bloks/footer.php'; ?>

</body>
</html>