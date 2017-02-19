<?php
/**
 * Created by PhpStorm.
 * User: fridurmus
 * Date: 2/9/17
 * Time: 10:09 PM
 */

require_once "core/header.php";
require_once "assets/database_functions.php";
require_once "assets/form_generator.php";

$loginUserName = textForm("Username", "loginUserName", "", '', 'r', ['userNameForm']);
$loginPassword = textForm("Password", "loginPassword", "", '', 'r', ['passwordForm']);
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div id="messagebox">

            </div>
        </div>
    </div>
    <form id="loginForm">
        <div class="row">
            <div class="loginUserName col-md-4 offset-md-2 form-group">
                <?=$loginUserName?>
                <div id="nonExistUser" class="form-control-feedback collapse"></div>
            </div>
            <div class="loginPassword col-md-4 form-group">
                <?=$loginPassword?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-6">
                <button id="loginSubmit" class="btn btn-primary pull-right">Log In</button>
            </div>
        </div>
    </form>
</div>

<?PHP require_once "core/footer.php"; ?>
<script type="text/javascript" src="scripts/login_handling.js"></script>