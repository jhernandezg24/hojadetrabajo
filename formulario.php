<?php
$errorNombre = $errorCorreo = $errorEdad = "";
$nombre = $correo = "";
$edad = 0;
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $edad = isset($_POST['edad']) ? (int)$_POST['edad'] : 0;

    if (empty($nombre)) {
        $errorNombre = "El nombre no puede estar vacío.";
    }
    
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errorCorreo = "El correo no tiene un formato válido.";
    }
    
    if ($edad <= 0) {
        $errorEdad = "La edad debe ser un número mayor que 0.";
    }
    
    if (empty($errorNombre) && empty($errorCorreo) && empty($errorEdad)) {
        $mensaje = "Hola $nombre, tus datos han sido registrados correctamente.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Registro</title>
</head>
<body>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
        <span style="color:red;"> <?php echo $errorNombre; ?> </span>
        <br>
        
        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
        <span style="color:red;"> <?php echo $errorCorreo; ?> </span>
        <br>
        
        <label for="edad">Edad:</label>
        <input type="number" name="edad" value="<?php echo htmlspecialchars($edad); ?>" required>
        <span style="color:red;"> <?php echo $errorEdad; ?> </span>
        <br>
        
        <input type="submit" value="Registrar">
    </form>
    
    <?php if (!empty($mensaje)) { echo "<p style='color:green;'>$mensaje</p>"; } ?>
</body>
</html>
