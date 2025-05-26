<?php
echo "<h3>Прості числа від 1 до 50</h3>";

function isPrime($number) {
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

for ($i = 1; $i <= 50; $i++) {
    if (isPrime($i)) {
        echo "$i — просте число<br>";
    } else {
        echo "$i — не є простим<br>";
    }
}
?>
