<?php
/**
 * Created by PhpStorm.
 * User: fridurmus
 * Date: 2/7/17
 * Time: 7:58 PM
 */

require_once "core/header.php";
require_once "assets/database_functions.php";
require_once "assets/form_generator.php";
$existingUsers = [];
$preExistUserSql = "SELECT user_name
                    FROM users";
$preExistUsers = pdoSelect($preExistUserSql);
foreach ($preExistUsers as $preExistUser){
    extract($preExistUser);
    array_push($existingUsers, $user_name);
}

$newUserName = textForm("Username", "newUserName", "Something clever.", '', 'r');
$newLoginName = textForm("Login Name", "newLoginName", "Ideally not just your Username.", '', 'r');
$newPassword = textForm("Password", "newPassword", "Something you'll remember.", '', 'r');
$passwordVerfiy = textForm("Verify Password", "newPasswordVerify", "Second verse, same as the first.", '', 'r');

?>

<div class="container">
    <form id="registerForm">
        <div class="row">
            <div class="col-md-4 offset-md-2">
                <?=$newUserName?>
            </div>
            <div class="col-md-4">
                <?=$newLoginName?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-2">
                <?=$newPassword?>
            </div>
            <div class="col-md-4">
                <?=$passwordVerfiy?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-6">
                <button class="btn btn-primary pull-right">Register</button>
            </div>
        </div>
    </form>
</div>



<?php
require_once "core/footer.php";
?>

<script>
    $("#registerForm").on("submit", function (e){
        (e).preventDefault();
        const registerData = $( this ).serialize();
        
    })
</script>