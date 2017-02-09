<?php
/**
 * Created by PhpStorm.
 * User: Sean Davis
 * Date: 1/18/2017
 * Time: 12:04 PM
 */
require_once '../assets/database_functions.php';
$userName = $_POST['newUserName'];
$newEmail = $_POST['newEmail'];
$newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (user_name, email_addr, user_pw_hash)
        VALUES (:user_name, :email_addr, :passHash)";

$vars = array(':user_name'=>$userName, ':email_addr'=>$newEmail, ':passHash'=>$newPassword);
$insertResult = pdoInsert($sql, $vars);

if($insertResult){
    echo '|s';
}

else {
    echo '|e';
}
?>