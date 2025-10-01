<?php
$uploadDir = "uploads/";

echo "<h2>Список файлів у папці uploads:</h2>";

if (is_dir($uploadDir)) {
    $files = scandir($uploadDir);
    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            echo "<a href='$uploadDir$file' download>$file</a><br>";
        }
    }
} else {
    echo "Папка uploads ще не створена.";
}

echo "<br><a href='index.html'>Назад</a>";
?>
