<?php

    include 'conexion_be.php';
 
    $nombre_completo = $_POST['nombre_completo'];
    $correo_electronico = $_POST['correo_electronico'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    //Encryptamiento de contraseña
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO usuarios(nombre_completo, correo_electronico, usuario, contrasena)VALUES('$nombre_completo','$correo_electronico','$usuario','$contrasena')";

    //Verificar que el correo no se repita en db
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo_electronico= '$correo_electronico'");
    
    if (mysqli_num_rows($verificar_correo) > 0) {
        echo '
        <script>
            alert("El correo ya existe en la base de datos");
            window.location = "../index.php";
        </script> 
        ';
        exit();
       }
     //Verificar que el usuario no se repita en db
     $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario= '$usuario'");
    
     if (mysqli_num_rows($verificar_usuario) > 0) {
         echo '
         <script>
             alert("Este usuario ya existe en la base de datos");
             window.location = "../index.php";
         </script> 
         ';
         exit();
        }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
            alert("Usuario almacenado con exito");
            window.location = "../index.php";
            </script>
        ';
        }else{
            echo'
            <script>
            alert("Intentalo de nuevo usuario almacenado");
            window.location = "../index.php";
            </script>
            ';
    }

    mysqli_close($conexion);

    

 ?>