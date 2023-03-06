<?php
include '../model/User.php';
if($_POST['btn_action'] == 'Delete'){
    $User = new User("","");
    $User->deleteUser( $_POST['user_id']);
    header("Location: ../view/tables.php");
}



