<div id="navR"><h1 id="h1">#Теги</h1>
    <div id="tags">
<?php $tags = mysql_query("SELECT * FROM tags");
 while ($tag = mysql_fetch_array($tags)){
     echo '<a href="tag.php?tag='.$tag['tag'].'" id="tag">'.$tag['tag'].'</a>';
 }
?>
       </div>  
    
</div>