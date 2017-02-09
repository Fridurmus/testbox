<?php
/**
 * Created by PhpStorm.
 * User: Sean Davis
 * Date: 1/18/2017
 * Time: 12:04 PM
 */
require_once '../assets/database_functions.php';
$userName = $_POST['newUserName'];
$loginName = $_POST['newLoginName'];
$newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (user_name, login_name, user_pw_hash)
        VALUES (:user_name, :login_name, :passHash)";

$vars = array(':user_name'=>$userName, ':login_name'=>$loginName, ':passHash'=>$newPassword);
$insertResult = pdoInsert($sql, $vars);

if($insertResult){
    echo '|s';
}

else {
    echo '|e';
}
?>