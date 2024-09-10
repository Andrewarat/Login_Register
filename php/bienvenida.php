<?php 
    session_start();

    if(!isset($_SESSION['usuarios'])){
        echo '
            <script>
                alert("Por favor debes iniciar sesion");
                window.location = "../index.php";
            </script>
        ';        
        session_destroy();
        die();
    }
    
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Bienvenidos</title>


    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/estilos.css">
</head>
<body>
    <h1>¡Bienvenidos a Mi sitio ↑↓→↑↨!</h1>
    <a href="php/cerrar_session.php">Cerrar Session</a>
    <hr>
    <button href="../index.php">Cerrar</button>
</body>
</html>