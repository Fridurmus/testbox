<?php
/**
 * Created by PhpStorm.
 * User: fridurmus
 * Date: 2/7/17
 * Time: 5:35 PM
 */

require_once "core/header.php";
require_once "assets/database_functions.php";

$dbTestSql = "SELECT * FROM users";
$dbTestRows = pdoSelect($dbTestSql);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <table class="table table-bordered">
                <thead class="thead-default">
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Type</th>
                </thead>
                <tbody>
                <?PHP
                foreach( $dbTestRows as $dbTestRow ){
                    extract($dbTestRow);
                    $userName = htmlspecialchars($user_name);
                    echo <<<TST
                    <tr>
                        <td>$user_id</td>
                        <td>$userName</td>
                        <td>$user_type</td>
                    </tr>
TST;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?PHP

require_once "core/footer.php";

?>