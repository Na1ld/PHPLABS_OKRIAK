<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Events";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}

// Обробка форми оновлення
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = $_POST["event_id"];
    $new_attendees = $_POST["attendees"];
    
    $sql = "UPDATE EventDetails SET attendees = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $new_attendees, $event_id);
    
    if ($stmt->execute()) {
        $message = "<p style='color: green;'>Кількість учасників успішно оновлена!</p>";
    } else {
        $message = "<p style='color: red;'>Помилка оновлення: " . $conn->error . "</p>";
    }
}

// Отримання списку всіх подій для випадаючого списку
$sql_events = "SELECT id, event_name FROM EventDetails ORDER BY event_date";
$result_events = $conn->query($sql_events);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Редагування учасників</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .menu { margin: 20px 0; }
        .menu a { display: inline-block; margin-right: 10px; padding: 8px 15px; background: #4CAF50; color: white; text-decoration: none; border-radius: 4px; }
        .menu a:hover { background: #45a049; }
        form { margin-top: 20px; }
        label { display: inline-block; width: 150px; margin-bottom: 10px; }
        input, select { padding: 8px; margin-bottom: 10px; }
        button { padding: 8px 15px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #45a049; }
    </style>
</head>
<body>
    <div class="menu">
        <a href="lab6var6z1.php">Головна</a>
        <a href="view_events.php">Перегляд подій</a>
        <a href="edit_attendees.php">Редагування учасників</a>
    </div>

    <h2>Редагування кількості учасників</h2>
    
    <?php if (isset($message)) echo $message; ?>
    
    <form method="post" action="">
        <label for="event_id">Оберіть подію:</label>
        <select name="event_id" id="event_id" required>
            <option value="">-- Виберіть подію --</option>
            <?php
            if ($result_events->num_rows > 0) {
                while ($row = $result_events->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['event_name']}</option>";
                }
            }
            ?>
        </select>
        <br>
        
        <label for="attendees">Нова кількість учасників:</label>
        <input type="number" name="attendees" id="attendees" min="0" required>
        <br>
        
        <button type="submit">Оновити</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>