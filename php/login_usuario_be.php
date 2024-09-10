<?php
    session_start();


    include 'conexion_be.php';

    $correo_electronico = $_POST['correo_electronico'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo_electronico= '$correo_electronico' and contrasena='$contrasena'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuarios'] = $correo_electronico;
        header("location: ./bienvenida.php");
        exit;
    }else{
        echo'
            <script>
                alert("Usuario no Existe verifique sus datos")
                window.location = "../index.php";
            </script>
        ';

        exit;
    }




?>