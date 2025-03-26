<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name_user = htmlspecialchars($_POST["name"] ?? "");
    $email_user = htmlspecialchars($_POST["email"] ?? "");
    $message_user = htmlspecialchars($_POST["message"] ?? "");
}
?>