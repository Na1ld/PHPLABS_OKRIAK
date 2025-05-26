<?php
$season = "";

if (isset($_GET['month']) && isset($_GET['day'])) {
    $month = (int)$_GET['month'];
    $day = (int)$_GET['day'];

    if (($month == 12 && $day >= 1) || $month == 1 || $month == 2 || ($month == 3 && $day < 20)) {
        $season = "Зима";
    } elseif (($month == 3 && $day >= 20) || $month == 4 || $month == 5 || ($month == 6 && $day < 21)) {
        $season = "Весна";
    } elseif (($month == 6 && $day >= 21) || $month == 7 || $month == 8 || ($month == 9 && $day < 23)) {
        $season = "Літо";
    } elseif (($month == 9 && $day >= 23) || $month == 10 || $month == 11 || ($month == 12 && $day < 1)) {
        $season = "Осінь";
    } else {
        $season = "Невірна дата";
    }
}
?>

<form method="get">
    <label>Місяць (1-12): <input type="number" name="month" required></label><br>
    <label>День (1-31): <input type="number" name="day" required></label><br>
    <input type="submit" value="Визначити пору року">
</form>

<?php
if ($season) {
    echo "<p><strong>Пора року:</strong> $season</p>";
}
?>
