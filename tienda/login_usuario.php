<?php

// Se crea variable de session 

session_start();
include 'conexion.php';

// Traemos datos 

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$_SESSION['usuario']=$usuario;


// Validar el inicio de sesion 

$validar_login = mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo = '$usuario'
and contraseña = '$contrasena'" );

//Según rol entra en diferentes pantallas

$filas = mysqli_fetch_array($validar_login);

if (mysqli_num_rows($validar_login)> 0 ) {

          // cookie
    header("location: bienvenida.php");

    $username = $_POST['usuario'];
    setcookie('usuario', $username, time() + (86400 * 30), '/'); // Cookie válida por 30 días
    

}else{
    echo '
        <script>
            alert("Credenciales incorrectas o el usuario no existe");
            window.location = "index.php";
        </script>
         ';
}

?>