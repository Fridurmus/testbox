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

$newUserName = textForm("Username", "newUserName", "Something clever.", '', 'r', ['newUserNameForm']);
$newEmail = emailForm("Email Address", "newEmail", "default@example.com", '', 'r', ['newEmailForm']);
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
            <div class="userName col-md-4 offset-md-2 form-group">
                <?=$newUserName?>
                <div id="takenUserName" class="form-control-feedback collapse">Sorry, that username's taken.</div>
            </div>
            <div class="newEmail col-md-4 form-group">
                <?=$newEmail?>
                <div id="invalidEmail" class="form-control-feedback collapse">Please enter a valid email.</div>
            </div>
        </div>
        <div class="row">
            <div class="passVerify col-md-4 offset-md-2 form-group">
                <?=$newPassword?>
            </div>
            <div class="passVerify col-md-4 form-group">
                <?=$passwordVerify?>
                <div id="pwNoMatch" class="form-control-feedback collapse">Make sure both passwords match!</div>
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
<!-- Generic Form Validation Script -->
<script type="text/javascript" src="scripts/form_verification.js"></script>
<!-- Passing existing users array from PHP to JS -->
<script>const existingUsers = <?PHP echo json_encode($existingUsers); ?>;</script>
<!-- Registration form validation script -->
<script type="text/javascript" src="scripts/register_form_validate.js"></script>
<!-- Registration form submission handling -->
<script type="text/javascript" src="scripts/register_handling.js"></script>
