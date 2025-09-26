<?php
$firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
$lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';

if (empty($firstName) || empty($lastName)) {
    echo "Будь ласка, введіть і ім'я, і прізвище.";
} else {
    echo "Привіт, $firstName $lastName!";
}
?>
