<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['userfile'])) {
        $file = $_FILES['userfile'];

        if (is_uploaded_file($file['tmp_name'])) {
            $allowed = ['jpg', 'jpeg', 'png'];
            $maxSize = 2 * 1024 * 1024; // 2 MB
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if (in_array($ext, $allowed) && $file['size'] <= $maxSize) {
                $uploadDir = __DIR__ . "/uploads/"; // ✅ правильний шлях у твоїй lab2
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $filename = basename($file['name']);
                $target = $uploadDir . $filename;

                if (file_exists($target)) {
                    $filename = pathinfo($file['name'], PATHINFO_FILENAME) . "_" . time() . "." . $ext;
                    $target = $uploadDir . $filename;
                }

                if (move_uploaded_file($file['tmp_name'], $target)) {
                    echo "<h3>Файл успішно завантажено!</h3>";
                    echo "Ім'я файлу: " . htmlspecialchars($filename) . "<br>";
                    echo "Тип файлу: " . htmlspecialchars($file['type']) . "<br>";
                    echo "Розмір: " . round($file['size'] / 1024, 2) . " КБ<br>";
                    echo "<a href='uploads/$filename' download>Завантажити файл</a><br>";
                } else {
                    echo "Помилка при збереженні файлу.";
                }
            } else {
                echo "Дозволені лише JPG, JPEG, PNG до 2 МБ.";
            }
        } else {
            echo "Файл не був завантажений.";
        }
    }
}
