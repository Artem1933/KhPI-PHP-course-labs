<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторна №7</title>
    <link rel="stylesheet" href="style.php">
    <script src="script.php"></script>
</head>
<body>

    <div class="card">
        <h1>Лабораторна робота №7</h1>
        <p>Реалізовано всі вимоги.</p>
    </div>

    <div class="card">
        <h2>1. Клієнтський кеш (CSS)</h2>
        <p>Стилі цієї сторінки завантажуються з <code>style.php</code>.</p>
        <p class="cache-info">Перевірте Network -> style.php (Disk/Memory Cache)</p>
    </div>

    <div class="card">
        <h2>2. Клієнтський кеш (JavaScript)</h2>
        <p>Ми підключили файл <code>script.php</code>. Він кешується на 60 секунд.</p>
        <p>Час генерації файлу на сервері: <span id="js-cache-time">Завантаження...</span></p>
        <button onclick="showCachedMessage()">Викликати функцію з JS</button>
        <p><i>Спробуйте оновити сторінку (F5). Час не повинен змінюватися протягом хвилини.</i></p>
    </div>

    <div class="card">
        <h2>3. Серверний кеш (Файл)</h2>
        <p>Генерація звіту у файл на 10 хв.</p>
        <a href="generate-report.php" target="_blank"><button>Відкрити звіт</button></a>
    </div>

    <div class="card">
        <h2>4. Кеш у Сесії</h2>
        <button onclick="loadCurrency()">Завантажити курси валют</button>
        <div id="result" style="margin-top: 10px; display:none; border-top:1px solid #eee; padding-top:10px;">
            <p>Джерело: <b id="source"></b></p>
            <pre id="json-data" style="background:#eee; padding:5px;"></pre>
        </div>
    </div>

    <div class="card">
        <h2>5. Статичне кешування (Static Property)</h2>
        <p>Кешування даних в межах виконання одного скрипта (static-cache.php):</p>
        <?php 
            include 'static-cache.php'; 
        ?>
    </div>

    <script>
        async function loadCurrency() {
            const btn = document.querySelector('button[onclick="loadCurrency()"]');
            btn.disabled = true; btn.textContent = "Завантаження...";
            
            try {
                const resp = await fetch('session-cache.php');
                const data = await resp.json();
                document.getElementById('result').style.display = 'block';
                document.getElementById('source').textContent = data.source;
                document.getElementById('json-data').textContent = JSON.stringify(data.data, null, 2);
            } catch (e) {
                alert("Помилка завантаження даних");
            } finally {
                btn.disabled = false; btn.textContent = "Завантажити курси валют";
            }
        }
    </script>
</body>
</html>