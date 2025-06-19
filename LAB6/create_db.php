<?php
$servername = "localhost";
$username = "root";
$password = ""; // заміни на свій пароль, якщо він є

// Створення з'єднання
$conn = new mysqli($servername, $username, $password);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}

// Створення бази даних
$sql = "CREATE DATABASE IF NOT EXISTS Events";
if ($conn->query($sql) === TRUE) {
    echo "База даних 'Events' створена успішно.<br>";
} else {
    echo "Помилка при створенні бази: " . $conn->error;
}

// Підключення до створеної бази
$conn->select_db("Events");

// Створення таблиці EventDetails
$sql = "CREATE TABLE IF NOT EXISTS EventDetails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL,
    attendees INT DEFAULT 0
)";
if ($conn->query($sql) === TRUE) {
    echo "Таблиця 'EventDetails' створена успішно.<br>";
} else {
    echo "Помилка при створенні таблиці: " . $conn->error;
}

// Закриття з'єднання
$conn->close();
?>
