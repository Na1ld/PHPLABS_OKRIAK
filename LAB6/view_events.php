<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Events";

// Створення з'єднання
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

// Тепер перевіряємо, чи існує таблиця перед додаванням даних
$sql = "SHOW TABLES LIKE 'EventDetails'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Перевіряємо, чи таблиця порожня
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
    } else {
        echo "<p>Таблиця вже містить дані, нові записи не додано.</p>";
    }
}

$conn->close();
?>