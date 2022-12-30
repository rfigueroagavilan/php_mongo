<?php

$rut = $_POST['rut'];
$pass = $_POST['pass'];

if($rut=="18255682-3" and $pass=="1234"){
    header("Location: ../index.php");
}else{
    $mensaje = "Credenciales incorrectas";
    echo'<script type="text/javascript">
    alert("Credenciales incorrectas");
    window.location.href="../login.php";
    </script>';
  }
?>
