<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "9@xYwHE@P&9DQ5bS";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE user = '$user' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso, redirige a inicio.html
        echo "<script>
                alert('Inicio de sesión exitoso.');
                window.location.href = 'menu';
              </script>";
    } else {
        // Inicio de sesión fallido, verifica cuál campo es incorrecto
        $sql = "SELECT * FROM usuarios WHERE user = '$user'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // El campo de contraseña es incorrecto
            echo "<script>
                    alert('Inicio de sesión fallido. La contraseña es incorrecta.');
                    window.location.href = 'login';
                  </script>";
        } else {
            // El campo de usuario es incorrecto
            echo "<script>
                    alert('Inicio de sesión fallido. El correo es incorrecto.');
                    window.location.href = 'login';
                  </script>";
        }
    }
}

$conn->close();
?>

