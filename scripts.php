    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="./public/sweetalert.min.js"></script>

    <script>
        function filtroLibros(){
        var filtroTxt = $('#filtroTxt').val();
        $.ajax({
        type: "GET",
        url: './listaLibros.php',
        data: 'filtroTxt='+filtroTxt,
        success: function(datos) {	
            $('#listaLibros').html(datos);
            }
        });
        }

        function filtroClientes(){
        var filtroTxt = $('#filtroTxt').val();
        $.ajax({
        type: "GET",
        url: './listaClientes.php',
        data: 'filtroTxt='+filtroTxt,
        success: function(datos) {	
            $('#listaClientes').html(datos);
            }
        });
        }

        function modalAgendamiento(idLibro){
        
        $.ajax({
        type: "GET",
        url: './modalAgendar.php',
        data: 'idLibro='+idLibro,
        success: function(datos) {	
            $('#modalAgendamiento').html(datos);
            //jQuery(preAgendamiento).modal("show");
            //$('#preAgendamiento').toggle();
            $("#preAgendamiento").modal('show');

            }
        });
        }

        function modalRecepcionar(ultimoIdEntrega){
        
        $.ajax({
        type: "GET",
        url: './modalRecepcionar.php',
        data: 'ultimoIdEntrega='+ultimoIdEntrega,
        success: function(datos) {	
            $('#modalRecepcionar').html(datos);
            //jQuery(preAgendamiento).modal("show");
            //$('#preAgendamiento').toggle();
            $("#preRecepcion").modal('show');

            }
        });
        }

        function filtroRut(){
        var filtroTxt = $('#rut').val();
        $.ajax({
        type: "GET",
        url: './filtrarRut.php',
        data: 'filtroTxt='+filtroTxt,
        beforeSend: function() {
                    $("#rut").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data) {
            $("#sugerenciaRut").show();
            $("#sugerenciaRut").html(data);
            $("#rut").css("background", "#009900");
        }
        });
        }


        function filtroNombre(){
        var filtroTxt = $('#nombre').val();
        $.ajax({
        type: "GET",
        url: './filtrarNombre.php',
        data: 'filtroTxt='+filtroTxt,
        beforeSend: function() {
                    $("#nombre").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data) {
            $("#sugerenciaNombre").show();
            $("#sugerenciaNombre").html(data);
            $("#nombre").css("background", "#009900");
        }
        });
        }


        //To select a country name
        function seleccionarCliente(nombre,rut,id) {
            $("#nombre").val(nombre);
            $("#rut").val(rut);
            $("#idCliente").val(id);
            $("#sugerenciaNombre").hide();
            $("#sugerenciaRut").hide();
        }

        filtroLibros();
        filtroClientes();
    </script>
</body>
</html>