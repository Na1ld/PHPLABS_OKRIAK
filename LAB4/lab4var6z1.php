<?php
echo "<h3>Частотність елементів у масиві</h3>";

$array = [2, 3, 2, 5, 3, 2, 7, 5, 3, 7, 5, 5];

$frequency = array_count_values($array);

foreach ($frequency as $value => $count) {
    echo "Елемент $value зустрічається $count раз(и)<br>";
}
?>
