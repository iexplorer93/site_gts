<?php
$r1 = mysql_fetch_array(mysql_query("SELECT * FROM rubrics WHERE id=1"));
$r2 = mysql_fetch_array(mysql_query("SELECT * FROM rubrics WHERE id=2"));
$r3 = mysql_fetch_array(mysql_query("SELECT * FROM rubrics WHERE id=3"));
$r4 = mysql_fetch_array(mysql_query("SELECT * FROM rubrics WHERE id=4"));
?>

<ul id="items">
        <li><a href="rubric.php?rubric=1" id="item1"><span id="item1text">Связь</span><br> <span id="comm">
            <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM comments WHERE rubricId=1"), 0); ?> 
                    комментариев</span></a></li>
        <li><a href="rubric.php?rubric=2" id="item2"><span id="item1text">Промышленная Автоматизация</span><br> <span id="comm">
            <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM comments WHERE rubricId=2"), 0); ?> 
                    комментариев</span></a> </li>
        <li><a href="rubric.php?rubric=3" id="item3"><span id="item1text">Проектные работы</span><br> <span id="comm">
            <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM comments WHERE rubricId=3"), 0); ?> 
                    комментариев</span></a> </li>
        <li><a href="rubric.php?rubric=4" id="item4"><span id="item1text">Телекоммуникации</span><br> <span id="comm">
            <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM comments WHERE rubricId=4"), 0); ?> 
                    комментариев</span></a> </li>