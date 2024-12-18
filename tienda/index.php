

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Nike</title>
    <link rel="icon" type="image/png" href="img/nikelogo.png">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'poppins',sans-serif;
}
body{
    background-color: #000000;
}
.login-form{
    position: relative;
    min-height: 100vh;
    z-index: 0;
    background-color: #000000;
    padding: 30px;
    justify-content: center;
    display: grid;

    grid-template-rows:1fr auto 1fr;
    align-items: center;
}

.container{
  max-width: 800px;  
  margin: 0 auto;
}

.login-form h1{
    text-align: center;
    font-size: 2.5rem;
    font-weight: 400;
    color: #ffff;
}

.login-form h2{
    line-height: 40px;
    margin-top: 5px;
    font-size: 30px;
    font-weight: 500;
    color: black;
    text-align: center;
}

.login-form .main{
    position: relative;
    display: flex;
    margin: 30px 0;
}

.content{
    flex-basis: 50%;
    padding: 3em 3em;
    background: #ffff;
    box-shadow: 2px 9px 49px -17px rgba(0,0,0,0.1);
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;

}

.form-img{
    flex-basis: 50%;
    background: #dfe5ea;
    background-size: cover;
    padding: 40px;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px ;
    align-items: center;
    display: grid;
}
.form-img img{
    max-width: 100%;
}
p{
    color: #667;
    font-size: 16px;
    line-height: 25px;
    opacity: 0.6;
    text-align: center;

}

.btn,button, input{
    border-radius: 35px;

}

.btn:hover,
button:hover{
    transition: 0.5s ease;
}   

a{
    text-decoration: none;
}

.login-form form{
    margin: 30px 0;
}
.login-form input{
    outline: none;
    margin-bottom: 15px;
    font-stretch: 16px;
    color: #999;
    text-align: left;
    padding: 14px 20px;
    width: 100%;
    display: inline-block;
    box-sizing: border-box;
    border: none;
    background: #f7fafc;
    transition: 0.3s ease;

}

.login-form input:focus{
    background: transparent;
    border: 1px solid #0568c1;
}

.login-form button{
    font-size:18px ;
    color: #fff;
    width: 100%;
    background: #000000;
    border: none;
    padding: 14px 15px;
    font-weight: 600;
    transition: 0.3s ease;
}

.login-form button:hover {
    background-color: #3dae2b; /* Cambia el color de fondo al pasar el cursor */
    border-color: #3dae2b; /* Cambia el color del borde al pasar el cursor */
    color: #fff; /* Color de texto blanco */
  }


p.account a{
    color: #000000;
}

p.account a:hover{
    text-decoration: underline;

}

.navbar-text {
    font-family: 'Roboto Italic', sans-serif;
    font-style: italic;
    font-size: 15px; /* Cambia el tamaño del texto según tu preferencia */
    color: white; /* Cambia el color del texto a blanco */

    display: block;
    text-align: center;
    margin-top: 10px; /* Ajusta el espacio superior según sea necesario */
}

.custom-h1 {
    font-family: 'Roboto', sans-serif;
    font-style: italic;
    color: #3dae2b;
    margin-left: 10px;
}
</style>
<script>
    function capitalizeFirstLetter() {
        // Obtener el valor del input
        let input = document.getElementById('usuario');
        let inputValue = input.value.toLowerCase(); // Convertir todo a minúsculas primero
        // Capitalizar la primera letra
        inputValue = inputValue.charAt(0).toUpperCase() + inputValue.slice(1);
        // Establecer el valor modificado de nuevo en el input
        input.value = inputValue;
    }
</script>
</head>
<body>
    <div class="login-form">
        <h1 class="custom-h1">Tienda Nike </h1>
        <div class="container">
            <div class="main">
              <div class="content">
                <h2>Bienvenido(a)!</h2>
                <form action="login_usuario.php" method="POST">
                    <!-- Usuario Login -->
                    <input type="text" id="usuario" name="usuario" placeholder="Digite su Usuario" required autofocus oninput="capitalizeFirstLetter()">
                    <!-- Contraseña login  -->
                    <input type="password" name="contrasena" placeholder="Digite su Contraseña" required autofocus="">
                    <button class="btn" type="submit">
                        Iniciar Sesión
                    </button>
                </form>
                <p class="account">
                    <!-- Redireccion a registro  -->
                    ¿No tienes cuenta? <a href="#">Registrate aquí</a></p>
              </div>
              <div class="form-img">
                <img src="img/logo2.png" alt="">
              </div>  
            </div>
        </div>
    </div>
</body>
</html>