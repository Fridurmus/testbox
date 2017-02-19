<?php
/**
 * Created by PhpStorm.
 * User: fridurmus
 * Date: 2/11/17
 * Time: 3:27 PM
 */
require_once '../assets/database_functions.php';
$userName = htmlspecialchars($_POST['loginUserName']);
$userPassword = $_POST['loginPassword'];

$sql = "SELECT user_name, user_pw_hash
        FROM users
        WHERE user_name = :user_name";

$vars = array(':user_name'=>$userName);
$userRecord = pdoSelect($sql, $vars);

if($userRecord){
    extract($userRecord[0]);
    if(password_verify($userPassword, $user_pw_hash)) {
        echo '|s';
    }
    else {
        echo '|e';
    }
}
else {
    echo '|e';
}
?>