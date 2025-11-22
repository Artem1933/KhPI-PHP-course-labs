<?php

header('Content-Type: application/javascript');

$seconds_to_cache = 60;
$ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";

header("Expires: $ts");
header("Pragma: cache");
header("Cache-Control: public, max-age=$seconds_to_cache");

$serverTime = date("H:i:s");
?>
// Цей код генерується PHP
console.log("JS файл завантажено. Час генерації на сервері: <?= $serverTime ?>");

// Функція, яку ми викличемо на головній сторінці
function showCachedMessage() {
    const msg = "Привіт! Цей текст прийшов із закешованого JS файлу.\nЧас його створення: <?= $serverTime ?>";
    alert(msg);
}

// Записуємо час у елемент на сторінці (якщо він існує)
document.addEventListener("DOMContentLoaded", function() {
    const el = document.getElementById('js-cache-time');
    if(el) {
        el.textContent = "<?= $serverTime ?>";
        el.style.color = "blue";
        el.style.fontWeight = "bold";
    }
});