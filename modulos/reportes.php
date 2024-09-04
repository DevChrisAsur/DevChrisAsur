<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
            Reportes Entradas/Salidas
     
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Reportes Entradas/Salidas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
        <br>

<div class="col-md-5">
                       
                            <div class="input-group-prepend">
                            <i class="fa fa-calendar-o" style="color:green"></i>&nbsp&nbsp<label>Fecha Inicio</label>
                             <input type="text" class="form-control" id="start_date" placeholder="Fecha Inicio" readonly>
                            </div>
                           
                        
                    </div>
                    <div class="col-md-5">
                        
                            <div class="input-group-prepend">
                              <i class="fa fa-calendar-o  " style="color:red"></i>&nbsp&nbsp<label>Fecha Final</label>
                            
                            <input type="text" class="form-control" id="end_date" placeholder="Fecha Fin" readonly>
                        </div>
                    </div>
                    <br>
                     
                     <div class="input-group-prepend">
                         <button id="filter" class="btn btn-success" style="margin: 4px 2px;width:110px; height:35px">Buscar</button>
                     &nbsp<button id="reset" class="btn btn-warning" style="margin: 4px 2px;width:110px; height:35px">Limpiar</button>
                </div>
               

      <div class="box-header with-border">
  
         
          




      </div>

      <div class="box-body">
        
    
           
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless display nowrap" id="records" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Identificacion</th>
                                         <th>Tarjeta</th>
                                         <th>Nombre</th>
                                         <th>Perfil</th>
                                         <th>Dependencia</th>
                                         <th>Controladora</th>
                                         <th>Fecha y Hora</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
     

      </div>

    </div>

  </section>

</div>


 






    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
  
    <!-- Optional JavaScript -->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
   

  
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script>
  

    <script>
    $(function() {
        $("#start_date").datepicker({
            //"dateFormat": "yy-mm-dd"
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy/mm/dd 00:00:00',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''

        });
        $("#end_date").datepicker({
            //"dateFormat": "yy-mm-dd"
            closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy/mm/dd 23:59:59',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
        });
    });
    </script>

    <script>
    // Fetch records

    function fetch(start_date, end_date) {
        
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                start_date: start_date,
                end_date: end_date
            },
            dataType: "json",
            success: function(data) {
                // Datatables
                var i = "1";

                $('#records').DataTable({
                    
                    "data": data,
                    // buttons
                    "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    "buttons": [
    {extend:"copy",title: "Entradas Gobernacion",text:'<i class="fa fa-copy"></i>&nbsp;&nbsp;Copiar',titleAttr:"Copiar",className:"btn-warning"},
      {extend:"csv",title: "Entradas Gobernacion ",text:'<i class="fa fa-file-o"></i>&nbsp;&nbsp;CSV',titleAttr:"Descargar CSV",className:"btn btn-info"},
      {extend:"excel",title: "Entradas Gobernacion",text:'<i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Excel',titleAttr:"Exportar a excel",className:"btn-success"},
      {extend:"pdf", title: "Entradas Gobernacion", orientation: 'landscape', pageSize: 'A4',text:'<i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF',titleAttr:"Exportar a PDF",className:"btn-danger"},
      {extend:"print",title: "Entradas Gobernacion",text:'<i class="fa fa-print"></i>&nbsp;&nbsp; Imprimir',titleAttr:"Imprimir",className:"btn-primary"}
                    ],
                    "language": {

       "sProcessing":     "Procesando...",
       "sLengthMenu":     "Mostrar _MENU_ registros",
       "sZeroRecords":    "No se encontraron resultados",
       "sEmptyTable":     "Ningún dato disponible en esta tabla",
       "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
       "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
       "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
       "sInfoPostFix":    "",
       "sSearch":         "Buscar:",
       "sUrl":            "",
       "sInfoThousands":  ",",
       "sLoadingRecords": "Cargando...",
       "oPaginate": {
         "sFirst":    "Primero",
         "sLast":     "Último",
         "sNext":     "Siguiente",
         "sPrevious": "Anterior"

       },
       "oAria": {
         "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
         "sSortDescending": ": Activar para ordenar la columna de manera descendente"
       },
       "buttons": {
                copyTitle: 'Copiado al portapapeles',
                copySuccess: {
                    _: 'Copiadas %d filas al portapapeles',
                    1: 'Copiadas 1 fila al portapapeles'
                }
            }

     },
        
                    // responsive
                    "responsive": true,
                     "aLengthMenu":[[100, 200, 300, 400, 500],[100, 200, 300, 400, 500]],
                    "columns": [{
                            "data": "TransanccionesID",
                            /*"render": function(data, type, row, meta) {
                                return i++;
                            }*/
                        },
                        {
                            "data": "Cedula"
                        },
                        {
                            "data": "Tarjeta"
                        },
                        {
                            "data": "Nombres"
                        },
                        {
                            "data": "Perfil",
                            "render": function(data, type, row, meta) {
                                var text;
                                   /*var text1='<?php echo $_SESSION["oficina"];?>';*/
                                //text=text.slice(0, 10);
                               

                                  text='<button class="btn btn-info btn-xs btnActivar">'+row.Perfil+'</button>';
                                

                                
                                return text;
                            }
                             
                        },
                        {
                            "data": "Oficina",
                            "render": function(data, type, row, meta) {
                                var text;
                                
                                //text=text.slice(0, 10);
                               

                                  text='<button class="btn btn-warning btn-xs btnActivar">'+row.Oficina+'</button>';
                                

                                
                                return text;
                            }
                           
                        },
                        {
                            "data": "Controlador",

                            "render": function(data, type, row, meta) {
                                var text=row.Controlador;
                                //text=text.slice(0, 10);
                                if (text=="1") {

                                  text='<button class="btn btn-success btn-xs btnActivar">ENTRADA</button>';
                                }else{
                                   text='<button class="btn btn-danger btn-xs btnActivar">SALIDA</button>';
                                }

                                
                                return text;
                            }
                            /*"render": function(data, type, row, meta) {
                                return `${row.standard}th Standard`;
                            }*/
                        },
                        {
                            "data": "FechaHora",
                            /*"render": function(data, type, row, meta) {
                                return `${row.percentage}%`;
                            }*/
                        }
                        
                        
                    ]
                });
            }
        });
    }
    fetch();

    // Filter

    $(document).on("click", "#filter", function(e) {
        e.preventDefault();

        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        if (start_date == "" || end_date == "") {
            alert("Debe Seleccionar una fecha");
        } else {
            $('#records').DataTable().destroy();
            fetch(start_date, end_date);
        }
    });

    // Reset

    $(document).on("click", "#reset", function(e) {
        e.preventDefault();

        $("#start_date").val(''); // empty value
        $("#end_date").val('');

        $('#records').DataTable().clear().destroy();




        //fetch();
    });
    </script>
