<?php
session_start();
include "../myAccount/database.php";
$con = BD::get_con();

if ($stmt = $con->prepare('INSERT INTO contact (id, nume, prenume, tara, mesaj) VALUES (?, ?, ?, ?, ? ) ')) {

    $NULL = NULL;
    $stmt->bind_param('issss', $NULL, $_POST['lname'], $_POST['fname'], $_POST['country'], $_POST['subject']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->close();
    header('Location: contact_form.html');

} else {
    throw new Exception('Error in statement: ' . $con->error);
}
$con->close();
?>

