<style>
h1 {
    padding-bottom: 50px;
    } 
#login {
    height: 50%;
    background-color: white;
    border-radius: 10px;
    padding-top: 50px;
    text-align: center;
    width: 35%;
    margin: 0 auto;
    margin-top: 50px;
    }
#rut{
  margin-right: 10px;
  margin-bottom:20px;
}

</style>
<?php include "./header.php";?>
<body>
    <div id="login">
        <h1>Inicio de sesion</h1>
            <form action="clases/ValidarUsu.php" method="post" class="form">
                <div id="rut">
                    <label for="">Rut Usuario:</label>
                    <input type="text" name="rut" class="usuario" pattern="[0-9.-]{8,12}" required>
                </div>
                <div id="rut">
                    <label for="">Contraseña:</label>
                    <input type="password" name="pass" class="usuario" required>
                </div>
                <div class="form__boton">
                    <button class="boton">Ingresar</button>
                </div>
            </form>
            
    </div>
    <?php include "./scripts.php"; ?>
</body>
</html>