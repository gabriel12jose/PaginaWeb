<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge y filtra los datos del formulario
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $usuario = htmlspecialchars(trim($_POST['usuario']));
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $email = htmlspecialchars(trim($_POST['email']));
    


    // Muestra los datos procesados (solo para fines de prueba)
    echo "<h1>Gracias por tu registro, $nombre</h1>";
    echo "<p>Nombre de usuario:</strong> $usuario</p>";
    echo "<p><strong>Teléfono:</strong> $telefono</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    
   

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root"; // Usuario predeterminado en XAMPP
    $password = "";     // Contraseña predeterminada en XAMPP
    $dbname = "examen";

    // Crea la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Inserta los datos en la tabla 'Usuarios'
    $sql = "INSERT INTO registroexamen (nombre, usuario, telefono, email) VALUES ('$nombre', '$usuario', '$telefono', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Tu registro ha sido guardado exitosamente en nuestra base de datos.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
}
?>


