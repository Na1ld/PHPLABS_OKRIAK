<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Events";

// Підключення до БД
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка
if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}

// Отримання майбутніх подій
$sql = "SELECT * FROM EventDetails WHERE event_date > CURDATE()";
$result = $conn->query($sql);

echo "<h2>Майбутні події:</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Назва</th><th>Місце</th><th>Дата</th><th>Учасники</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['event_name']}</td>
            <td>{$row['location']}</td>
            <td>{$row['event_date']}</td>
            <td>{$row['attendees']}</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "Немає майбутніх подій.";
}

$conn->close();

// Кнопки переходу
echo "<br><br>";
echo "<button onclick=\"window.location.href='index.html'\">На головну</button> ";
echo "<button onclick=\"history.back()\">Назад</button>";
?>
