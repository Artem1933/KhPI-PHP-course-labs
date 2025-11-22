<?php
session_start();

function generateData() {

    sleep(2);
    return [
        'usd' => rand(3800, 4200) / 100,
        'eur' => rand(4000, 4500) / 100,
        'btc' => rand(30000, 60000)
    ];
}

$response = [];
$cacheLifeTime = 60;

if (isset($_SESSION['cached_data']) && isset($_SESSION['cached_time']) && (time() - $_SESSION['cached_time'] < $cacheLifeTime)) {

    $data = $_SESSION['cached_data'];
    $source = "КЕШ СЕСІЇ";
    $time = date("H:i:s", $_SESSION['cached_time']);
} else {

    $data = generateData();
    
    $_SESSION['cached_data'] = $data;
    $_SESSION['cached_time'] = time();
    
    $source = "НОВА ГЕНЕРАЦІЯ";
    $time = date("H:i:s");
}

header('Content-Type: application/json');
echo json_encode([
    'source' => $source,
    'time' => $time,
    'data' => $data
]);
?>