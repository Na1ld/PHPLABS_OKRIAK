<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Events";

// Підключення до сервера MySQL
$conn = new mysqli($servername, $username, $password);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

// Створення бази даних
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "<p>База даних <strong>$dbname</strong> створена успішно.</p>";
} else {
    echo "Помилка створення бази даних: " . $conn->error;
}

// Використання бази даних
$conn->select_db($dbname);

// Створення таблиці EventDetails
$sql = "CREATE TABLE IF NOT EXISTS EventDetails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    event_date DATE NOT NULL,
    attendees INT DEFAULT 0
)";

if ($conn->query($sql) === TRUE) {
    echo "<p>Таблиця <strong>EventDetails</strong> створена успішно.</p>";
} else {
    echo "Помилка створення таблиці: " . $conn->error;
}

// Додавання тестових даних (якщо таблиця порожня)
$sql = "SELECT COUNT(*) as count FROM EventDetails";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($row['count'] == 0) {
    $sql = "INSERT INTO EventDetails (event_name, location, event_date, attendees) VALUES
        ('IT Conference', 'Kyiv', '2025-07-15', 120),
        ('Art Exhibition', 'Lviv', '2025-08-20', 80),
        ('Music Festival', 'Odesa', '2025-09-10', 500),
        ('Business Forum', 'Kharkiv', '2025-06-30', 200)";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Тестові дані успішно додані.</p>";
    } else {
        echo "Помилка додавання даних: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Управління подіями</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .menu { margin: 20px 0; }
        .menu a { display: inline-block; margin-right: 10px; padding: 8px 15px; background: #4CAF50; color: white; text-decoration: none; border-radius: 4px; }
        .menu a:hover { background: #45a049; }
    </style>
</head>
<body>
    <h1>Управління подіями</h1>
    
    <div class="menu">
        <a href="lab6var6z1.php">Головна (Створення БД)</a>
        <a href="view_events.php">Перегляд подій</a>
        <a href="edit_attendees.php">Редагування учасників</a>
    </div>

    <h2>Інструкція:</h2>
    <ol>
        <li>Ця сторінка створює базу даних "Events" та таблицю "EventDetails".</li>
        <li>Для перегляду подій перейдіть за посиланням "Перегляд подій".</li>
        <li>Для редагування кількості учасників виберіть "Редагування учасників".</li>
    </ol>
</body>
</html>