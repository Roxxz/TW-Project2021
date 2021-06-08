<?php
session_start();
if ( !isset($_POST['username'], $_POST['password'], $_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    exit('Please complete the registration form!');
}
include "database.php";
$con = BD::get_con();

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Email is not valid!');
}
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
    exit('Username is not valid!');
}
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    exit('Password must be between 5 and 20 characters long!');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ? AND username = ?')) {
    // We need to check if the account with that username and email exists.
    $stmt->bind_param('ss', $_POST['email'], $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo 'There already exists an account with this username and email!';

    } elseif ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
    // We need to check if the account with that username exists.
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo 'There already exists an account with this username!';

    } elseif ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            echo 'There already exists an account with this e-mail';
        }else {
                    // Insert new account
                    if ($stmt = $con->prepare('INSERT INTO accounts (username, email, password) VALUES (?, ?, ?)')) {
                        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $stmt->bind_param('sss', $_POST['username'], $_POST['email'], $password);
                        $stmt->execute();
                        $_SESSION['registered'] = TRUE;
                        header('Location: myAccount.php');
                    } else {
                        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
                        echo 'Could not prepare statement!';
                    }
                }
                $stmt->close();
            } else {
                // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
                echo 'Could not prepare statement!';
            }
        }
    }
$con->close();
?>