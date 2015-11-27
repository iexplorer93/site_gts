<?php include'connect.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$res = mysql_query("SELECT * FROM articles WHERE id=$id;");
$row = mysql_fetch_array($res);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title><?php echo $row['title']; ?></title>
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
							
                                                            echo '<div class="content_main">
						<div id="preview">';
								echo "<h3>".$row['title']."</h3>";
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
                                                                
                                                                echo $row['text']."<br>";
                                                                
                                                               
							

							?>
                            
                            
                                                <div id="commentSend">
                                                    <form action="send.php" method="POST">
                                                        <ul>
                                                            <li><span>Имя ></span><input type="text" name="name"></li>
                                                            <li><span>E-mail ></span><input type="email" name="email"></li>
                                                            <li><textarea name="text"></textarea>
                                                                <input type="hidden" value="<?php echo $id;?>" name="id">
                                                                <input type="hidden" value="<?php echo $row['rubric'];?>" name="rubricId">
                                                            </li>
                                                            <li><input id="btn" type="submit"></li>
                                                        </ul>
                                                    </form>
                                                </div>
                                            <div id="commentsGet">
                                                <br>
                                                <?php 
                                                    $res2 = mysql_query("SELECT * FROM comments WHERE articleId=$id");
                                                    while ($row2 = mysql_fetch_array($res2)){
                                                        echo '<img src="img/guest.png" width="50"><br>';
                                                        echo '<p id="name">'.$row2['name'].' '.$row2['date'].'<p>';
                                                        echo '<p>'.$row2['text'].'</p><br>';
                                                        
                                                    }
                                                ?>
                                                
                                                
                                        </div>    
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