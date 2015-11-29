<?php include'connect.php';
 if (isset($_POST['query'])){
     $query = $_POST['query'];
 }
    $query = trim($query); 
    $query = mysql_real_escape_string($query);
    $query = htmlspecialchars($query);
    
    

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>Поиск</title>
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
				
							<?php
                                                        
                                                        if(!empty($query)){
                                                            if(strlen($query) < 3){
                                                                echo '<div class="content_main">
                                                                    <div id="preview">';
                                                                echo "<h3>Резульат поиска:</h3>";
                                                                echo '<p>Слишком короткий поисковой запрос!!!</p>';
                                                                echo '</div></div>';
                                                            } else if(strlen($query) > 100){
                                                                echo '<div class="content_main">
                                                                        <div id="preview">';
                                                                echo "<h3>Резульат поиска:</h3>";
                                                                echo '<p>Слишком длинный поисковой запрос!!!</p>';
                                                                echo '</div></div>';
                                                            } else {
                                                                
                                                                
                                                                
                    $res = mysql_query("SELECT * FROM articles WHERE title LIKE '%$query%' OR description LIKE '%$query%' OR text LIKE '%$query%' OR meta_k LIKE '%$query%' OR meta_d LIKE '%$query%'");
                    $searchCount = mysql_result(mysql_query("SELECT COUNT(*) FROM articles WHERE title LIKE '%$query%' OR description LIKE '%$query%' OR text LIKE '%$query%' OR meta_k LIKE '%$query%' OR meta_d LIKE '%$query%'"), 0);
                        
                    echo '<div class="content_main">
                                                    <div id="preview">';
                                            echo "<h3>Резульат поиска:</h3><br>";
                                                                echo '<p>По запросу: <span style="color: #545454;
	font: 12pt Verdana-Regular, Verdana;
	text-transform: uppercase;">"'.$query.'"</span> найдено ('.$searchCount.') результатов!</p>';
                                            echo '</div></div>';                 
                                                                
                                                        
							while($row = mysql_fetch_array($res)){
                                                            echo '<div class="content_main">
                                                                    <div id="preview">';
								echo "<h3><a href=\"article.php?id=".$row['id']."\">".$row['title']."</a></h3>";
								echo "<ul id='icons'>
							<li><img src=\"img/cal.png\"><span class='iconsText'>".$row['date']."</span></li>
							<li><img src=\"img/user.png\"><span class='iconsText'>".$row['author']."</span></li>
							<li><img src=\"img/comment.png\"><span class='iconsText'>Комментарии ("; 
                                                                $articleId = $row['id'];
                                                                $countComment = mysql_result(mysql_query("SELECT COUNT(*) FROM comments WHERE articleId=$articleId"), 0);
                                                                if($countComment > 0){
                                                                    echo $countComment;
                                                                } else {
                                                                    echo 0;
                                                                }
                                                                
                                                                echo ")</span></li>
							<li><img src=\"img/share.png\"><span class='iconsText'>Поделиться</span></li>
						</ul><br>";
                                                                if($row['img'] != ""){
                                                                echo '<img src="'.$row['img'].'" width="470" height="272">';
                                                                }
                                                                
                                                                echo $row['description']."<br>";
                                                                
                                                                echo '</div>
                                                                    </div>';
							}
                                                            }
                                                        } else {
                                                            header("Refresh: 0; URL=index.php");
                                                        }



							?>

                                                    

						
			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="left-sidebar">
			<div id="navL">
				<h1 id="h1">Навигация</h1>
				<?php include './bloks/nav.php';?>
			</div>
		</aside><!-- .left-sidebar -->

                <aside class="right-sidebar" >
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