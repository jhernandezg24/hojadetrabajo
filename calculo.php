<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
    $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0;

    if ($num1 > 0 && $num2 > 0) {
        echo "Suma: " . ($num1 + $num2) . "<br>";
        echo "Resta: " . ($num1 - $num2) . "<br>";
        echo "Multiplicación: " . ($num1 * $num2) . "<br>";
        echo "División: " . ($num2 != 0 ? ($num1 / $num2) : "No se puede dividir por cero") . "<br>";
    } else {
        echo "Ambos números deben ser mayores que 0.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Operaciones Matemáticas</title>
</head>
<body>
    <form method="post">
        <label for="num1">Número 1:</label>
        <input type="number" name="num1" step="any" required>
        <br>
        <label for="num2">Número 2:</label>
        <input type="number" name="num2" step="any" required>
        <br>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>
