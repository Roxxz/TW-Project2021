<?php
session_start();
include "database.php";
$con = BD::get_con();

if ( !isset($_POST['newPassword'], $_POST['confirmPassword'], $_POST['username']) || empty($_POST['newPassword']) || empty($_POST['confirmPassword']) || empty($_POST['username'])) {
    exit('Please complete all fields!');
}
if($_POST['newPassword'] !== $_POST['confirmPassword']){
    exit('New-password and confirm-password fields must be identical');
}
if ((strlen($_POST['newPassword']) > 20 || strlen($_POST['newPassword']) < 5) ||
    (strlen($_POST['confirmPassword']) > 20 || strlen($_POST['confirmPassword']) < 5)) {
    exit('Password must be between 5 and 20 characters long!');
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        if ($stmt = $con->prepare('UPDATE accounts SET password = ? WHERE username = ?')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            $stmt->bind_param('ss',$password, $_POST['username']);
            $stmt->execute();
            $_SESSION['passwordChanged'] = TRUE;
            header('Location: myAccount.php');
        } else {
            echo 'Could not prepare statement!';
        }
    } else {
        echo 'No account with this username exists!';
    }
    $stmt->close();
}
$con->close();
?>