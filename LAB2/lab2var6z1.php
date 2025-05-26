<?php
$alpha = 45;
$beta = 60;

$alpha_rad = deg2rad($alpha);
$beta_rad = deg2rad($beta);

$sin_alpha = sin($alpha_rad);
$cos_beta = cos($beta_rad);
$y = $sin_alpha + $cos_beta;

echo "Значення α = $alpha градусів<br>";
echo "Значення β = $beta градусів<br><br>";

echo "α в радіанах: $alpha_rad<br>";
echo "β в радіанах: $beta_rad<br><br>";

echo "sin(α) = $sin_alpha<br>";
echo "cos(β) = $cos_beta<br>";
echo "y = sin(α) + cos(β) = $sin_alpha + $cos_beta = $y<br>";
?>
