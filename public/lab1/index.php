<?php

// ===== 1. Базовий PHP-скрипт =====
echo "Hello, World!";
echo "<br><br>";


// ===== 2. Змінні та типи даних =====
$stringVar = "Привіт";
$intVar = 52;
$floatVar = 3.14;
$boolVar = true;

echo "Рядок: $stringVar<br>";
echo "Ціле число: $intVar<br>";
echo "Число з плаваючою комою: $floatVar<br>";
echo "Булеве значення: " . ($boolVar ? "true" : "false") . "<br>";

echo "Типи змінних:<br>";
var_dump($stringVar);
echo "<br>";
var_dump($intVar);
echo "<br>";
var_dump($floatVar);
echo "<br>";
var_dump($boolVar);
echo "<br><br>";


// ===== 3. Конкатенація рядків =====
$firstName = "Максим";
$lastName = "Ткаченко";
$fullName = $firstName . " " . $lastName;
echo "Повне ім'я: $fullName<br><br>";


// ===== 4. Умовні конструкції =====
$number = 9;
if ($number % 2 == 0) {
    echo "Число $number є парним<br><br>";
} else {
    echo "Число $number є непарним<br><br>";
}


// ===== 5. Цикли =====
echo "Цикл for (від 1 до 10):<br>";
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
echo "<br><br>";

echo "Цикл while (від 10 до 1):<br>";
$j = 10;
while ($j >= 1) {
    echo $j . " ";
    $j--;
}
echo "<br><br>";


// ===== 6. Масиви =====
$student = [
    "ім'я" => "Дмитро",
    "прізвище" => "Гусак",
    "вік" => 19,
    "спеціальність" => "Комп'ютерні науки"
];

echo "Інформація про студента:<br>";
foreach ($student as $key => $value) {
    echo ucfirst($key) . ": $value<br>";
}

$student["середній_бал"] = 93;

echo "<br>Оновлений масив:<br>";
print_r($student);

?>
