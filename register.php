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
$newPassword = textForm("Password", "newPassword", "Something you'll remember.", '', 'r', ['passVerifyForm']);
$passwordVerify = textForm("Verify Password", "newPasswordVerify", "Second verse, same as the first.", '', 'r', ['passVerifyForm']);

?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div id="messagebox">

            </div>
        </div>
    </div>
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
            <div class="passVerify col-md-4 offset-md-2 form-group">
                <?=$newPassword?>
            </div>
            <div class="passVerify col-md-4 form-group">
                <?=$passwordVerify?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-6">
                <button id="registerSubmit" class="btn btn-primary pull-right">Register</button>
            </div>
        </div>
    </form>
</div>


<?php
require_once "core/footer.php";
?>
<script type="text/javascript" src="scripts/form_verification.js"></script>
<script>
    $(".passVerifyForm").on("keyup", function(){
        let $passIn = $("#newPassword").val();
        let $passVal = $("#newPasswordVerify").val();
        console.log($passIn + "|" + $passVal);
        if($passVal != $passIn || $passVal.length == 0 || $passIn.length == 0){
            verifyError(".passVerifyForm", ".passVerify", "#registerSubmit");
        }
        else{
            verifySuccess(".passVerifyForm", ".passVerify", "#registerSubmit");
        }
    });
</script>
<script type="text/javascript" src="scripts/register_handling.js"></script>
