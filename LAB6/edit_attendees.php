<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Events";

// Підключення до бази
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}

// Якщо форма була надіслана
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST["id"]);
    $attendees = intval($_POST["attendees"]);

    $sql = "UPDATE EventDetails SET attendees = $attendees WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>Кількість учасників оновлено успішно.</p>";
    } else {
        echo "<p style='color: red;'>Помилка: " . $conn->error . "</p>";
    }
}

// Отримати список подій
$result = $conn->query("SELECT id, event_name, attendees FROM EventDetails");

echo "<h2>Редагувати кількість учасників</h2>";

if ($result && $result->num_rows > 0) {
    echo "<form method='post'>";
    echo "<label>Оберіть подію: </label>";
    echo "<select name='id' required>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['id']}'>{$row['event_name']} (зараз: {$row['attendees']})</option>";
    }
    echo "</select><br><br>";

    echo "<label>Нова кількість учасників: </label>";
    echo "<input type='number' name='attendees' min='0' required><br><br>";

    echo "<input type='submit' value='Оновити'>";
    echo "</form>";
} else {
    echo "<p style='color: red;'>Подій не знайдено. Додайте хоча б одну подію в таблицю <strong>EventDetails</strong>.</p>";
}

$conn->close();

// Додаткові кнопки
echo "<br><br>";
echo "<button onclick=\"window.location.href='index.html'\">На головну</button> ";
echo "<button onclick=\"history.back()\">Назад</button>";
?>
