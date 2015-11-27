<div id="navR">
    <h1 id="h1">Последние новости</h1>
    
    <?php 
        function getNews($args){
            while ($rowNew = mysql_fetch_array($args)){
                echo '<a href="article.php?id='.$rowNew['id'].'" id="news">'.$rowNew['title'].'</a>';
                }
        }
    
        $news1 = mysql_query("SELECT * FROM articles WHERE rubric=1 ORDER BY date DESC LIMIT 1");
        $news2 = mysql_query("SELECT * FROM articles WHERE rubric=2 ORDER BY date DESC LIMIT 1");
        $news3 = mysql_query("SELECT * FROM articles WHERE rubric=3 ORDER BY date DESC LIMIT 1");
        $news4 = mysql_query("SELECT * FROM articles WHERE rubric=4 ORDER BY date DESC LIMIT 1");
        
        
        
        
        
        getNews($news1);
        getNews($news2);
        getNews($news3);
        getNews($news4);
        
        
        
    ?>
    <br>
    
    
</div>