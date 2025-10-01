<?php
$filename = "log.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['text'])) {
        $text = htmlspecialchars($_POST['text']);
        file_put_contents($filename, $text . PHP_EOL, FILE_APPEND);
    }
}

echo "<h2>Вміст файлу log.txt:</h2>";
if (file_exists($filename)) {
    $content = file_get_contents($filename);
    echo nl2br($content);
} else {
    echo "Файл log.txt порожній або ще не створений.";
}
echo "<br><br><a href='index.html'>Назад</a>";
?>
