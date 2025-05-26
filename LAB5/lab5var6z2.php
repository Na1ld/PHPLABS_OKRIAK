<?php
$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = trim($_POST['text']); // Обрізаємо пробіли

    if ($input === "") {
        $result = "Рядок порожній.";
    } elseif (preg_match('/^\d+$/', $input)) {
        $result = "Рядок містить лише цифри.";
    } else {
        $result = "Рядок містить не лише цифри.";
    }
}
?>

<form method="post">
    <label>Введіть текст: <input type="text" name="text" required></label><br>
    <input type="submit" value="Перевірити">
</form>

<?php
if ($result) {
    echo "<p><strong>Результат:</strong> $result</p>";
}
?>
