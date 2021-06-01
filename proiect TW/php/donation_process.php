<?php
session_start();
if ( !isset($_POST['money'], $_POST['email'], $_POST['cardNo'], $_POST['date'], $_POST['cvc']) || empty($_POST['money']) || empty($_POST['email'])|| empty($_POST['cardNo'])|| empty($_POST['date'])|| empty($_POST['cvc'])) {
    exit('Please complete every detail!');
}
include "../myAccount/database.php";
$con = BD::get_con();

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Email is not valid!');
}
if (preg_match('/^([0-9]*)$/', $_POST['money']) == 0) {
    exit('Amount not valid!');
}
if (preg_match('/^([0-9]*)$/', $_POST['cardNo']) == 0) {
    exit('Card Number not valid!');
}
if (preg_match('/^([0-9]*)$/', $_POST['cvc']) == 0) {
    exit('CVC not valid!');
}

$cardDate = DateTime::createFromFormat('m-y', $_POST['date']);
$currentDate = new DateTime('now');
$interval = $currentDate->diff($cardDate);
if ( $interval->invert == 1 ) {
    exit('Expiration date not valid!');
}
if (strlen($_POST['money']) > 6 || strlen($_POST['money']) < 2) {
    exit('For bigger donations, contact us directly!');
}
if (strlen($_POST['cardNo']) > 17 || strlen($_POST['cardNo']) < 16) {
    exit('Card Number not valid!');
}
if (strlen($_POST['cvc']) > 4 || strlen($_POST['cvc']) < 3) {
    exit('CVC not valid!');
}
if ($stmt = $con->prepare('INSERT INTO donations (email, amount) VALUES (?, ?)')) {
            $stmt->bind_param('si', $_POST['email'], $_POST['money']);
            $stmt->execute();
    $stmt->store_result();
    $_SESSION['donated'] = TRUE;
            header('Location: donation_done.php');
        } else {
            echo 'Could not prepare statement!';
        }
$stmt->close();
$con->close();
?>