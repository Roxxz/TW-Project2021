<?php
session_start();
include "../myAccount/database.php";
$con = BD::get_con();

if ($stmt = $con->prepare('INSERT INTO feedback (id, nume, prenume, tara, mesaj, tipPersoana) VALUES (?, ?, ?, ?, ?, ? ) ')) {

    $NULL = NULL;
    $stmt->bind_param('isssss', $NULL, $_POST['lname'], $_POST['fname'], $_POST['country'], $_POST['subject'], $_POST['wherefrom']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->close();
    header('Location: form.php');

} else {
    throw new Exception('Error in statement: ' . $con->error);
}

$con->close();
?>

