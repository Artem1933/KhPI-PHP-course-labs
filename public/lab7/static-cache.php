<?php
class StaticCache {
    private static $cache = null;
   
    public static $logs = [];

    public static function getValue() {
        if (self::$cache === null) {

            self::$logs[] = "🛑 Кеш порожній. Виконую складну роботу (sleep 1s)...";
            sleep(1);
            self::$cache = "Дані-" . rand(100, 999);
        } else {

            self::$logs[] = "Дані взято зі статичної властивості (Миттєво)!";
        }
        return self::$cache;
    }
}

$start1 = microtime(true);
$val1 = StaticCache::getValue();
$time1 = round(microtime(true) - $start1, 4);

$start2 = microtime(true);
$val2 = StaticCache::getValue();
$time2 = round(microtime(true) - $start2, 4);

echo "<div style='background:#f8f9fa; padding:15px; border:1px solid #ddd; border-radius:5px;'>";
echo "<h4>Результат тесту StaticCache:</h4>";
echo "<ul>";
foreach (StaticCache::$logs as $log) {
    echo "<li>$log</li>";
}
echo "</ul>";
echo "<p>Спроба 1: <b>$val1</b> (Час: $time1 сек)</p>";
echo "<p>Спроба 2: <b>$val2</b> (Час: $time2 сек)</p>";
echo "</div>";
?>