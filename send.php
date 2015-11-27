<?php
include './connect.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];    
}

if(isset($_POST['rubricId'])){
    $rubricId = $_POST['rubricId'];    
}

if(isset($_POST['name'])){
    $name = $_POST['name'];    
}

if(isset($_POST['email'])){
    $email = $_POST['email'];    
}

if(isset($_POST['text'])){
    $text = $_POST['text'];    
}


if($name != null && $email != null && $text != null && $id != null && $rubricId != null){
        $name = clean($name);
        $email = clean($email);
        $text = clean($text);        
        if(!empty($name) && !empty($email) && !empty($text)){
            $email_validate = filter_var($email, FILTER_VALIDATE_EMAIL); 
    if(check_length($name, 2, 25) && check_length($text, 2, 300) && $email_validate) {
            $date = date("Y-m-d");
            $result = mysql_query("INSERT INTO comments (name, email, text, articleId, date, rubricId) VALUES ('$name', '$email_validate', '$text', '$id', '$date', '$rubricId')");
            mail("email", "Новый комментарий $date от $name", "Комментарий оставил $name $date. \n"
                    . "$name пишет: \n"
                    . "-------------------------------------------------------------\n"
                    . "$text \n"
                    . "-------------------------------------------------------------\n"
                    . "Что бы посмотреть его перейдите по ссылке http://www.gts.ru/article.php?id=$id");
            if($result){
                header("Location:article.php?id=$id");
                }             
            } else {
                echo '<p>Проверьете правильность введенного имени и email.</p>'
                . '<p>Длина комментария должна быть не меньше 2 и не больше 300 символов</p>';
                echo '<p>Подождите вас перенаправят!</p>';
                header("Refresh: 3; URL=articles.php?id=$id");
            }
        } 
    }
           
 function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}   

function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}

?>
