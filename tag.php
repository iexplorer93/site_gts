<?php include'connect.php';
 
 if (isset($_GET['tag'])){
     $query = $_GET['tag'];
     $tag = $query;
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
	<title>Теги</title>
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
                                                            
                                                         $num = 3;
                    $page = $_GET['page'];                            
                    $result = mysql_query("SELECT COUNT(*) FROM articles WHERE title LIKE '%$query%' OR description LIKE '%$query%' OR text LIKE '%$query%' OR meta_k LIKE '%$query%' OR meta_d LIKE '%$query%'");
                    $posts = mysql_result($result, 0);  
                    $total = intval(($posts - 1) / $num) + 1;  
                    $page = intval($page);
                    if(empty($page) or $page < 0) $page = 1;  
                        if($page > $total) $page = $total; 
                    $start = $page * $num - $num;        
                    $res = mysql_query("SELECT * FROM articles WHERE title LIKE '%$query%' OR description LIKE '%$query%' OR text LIKE '%$query%' OR meta_k LIKE '%$query%' OR meta_d LIKE '%$query%' LIMIT $start, $num");
                    $searchCount = mysql_result(mysql_query("SELECT COUNT(*) FROM articles WHERE title LIKE '%$query%' OR description LIKE '%$query%' OR text LIKE '%$query%' OR meta_k LIKE '%$query%' OR meta_d LIKE '%$query%' "), 0);
                        
                    echo '<div class="content_main">
                                                    <div id="preview">';
                                            echo "<h3># ТЕги:</h3><br>";
                                                                echo '<p>По тегу: <span style="color: #545454;
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
                                                        
                                                        echo '<div class="content_main">
						<div id="preview">';
// Проверяем нужны ли стрелки назад  
if ($page != 1) $pervpage = '<a style="padding-right:20px;text-decoration: none;
	color: #545454;
	font: 10pt Verdana-Regular, Verdana;" href= ./tag.php?tag='.$tag.'&page='. ($page - 1) .'>Предыдущая   </a> ';  
// Проверяем нужны ли стрелки вперед  
if ($page != $total) $nextpage = '<a style="padding-left:25px;text-decoration: none;
	color: #545454;
	font: 10pt Verdana-Regular, Verdana;" href= ./tag.php?tag='.$tag.'&page=' .($page + 1). '>   Следующая</a>';  

// Находим две ближайшие станицы с обоих краев, если они есть  
if($page - 2 > 0) $page2left = '<a style="padding-left:10px;text-decoration: none;
	color: #545454;
	font: 10pt Verdana-Regular, Verdana;" href= ./tag.php?tag='.$tag.'&page='. ($page - 2) .'>'. ($page - 2) .'</a>  ';  
if($page - 1 > 0) $page1left = '<a style="padding-left:10px;text-decoration: none;
	color: #545454;
	font: 10pt Verdana-Regular, Verdana;" href= ./tag.php?tag='.$tag.'&page='. ($page - 1) .'>'. ($page - 1) .'</a>  ';  
if($page + 2 <= $total) $page2right = '<a style="padding-left:10px;text-decoration: none;
	color: #545454;
	font: 10pt Verdana-Regular, Verdana;" href= ./tag.php?tag='.$tag.'&page='. ($page + 2) .'>'. ($page + 2) .'</a>';  
if($page + 1 <= $total) $page1right = '<a style="padding-left:10px;text-decoration: none;
	color: #545454;
	font: 10pt Verdana-Regular, Verdana;" href= ./tag.php?tag='.$tag.'&page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 

// Вывод меню  
echo $pervpage.$page2left.$page1left."<b style='padding-left:10px; text-decoration: none;
	color: #545454;
	font: 10pt Verdana-Regular, Verdana;'>".$page."</b>".$page1right.$page2right.$nextpage;  
echo '</div>
				</div>';


                                                            
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