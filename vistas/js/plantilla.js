/*=============================================
SideBar Menu
=============================================*/

$('.sidebar-menu').tree()

/*=============================================
Data Table
=============================================*/

var minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();  
        var date = new Date( data[1] );
        
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);
$(document).ready(function() {
  var ruta = localStorage.getItem("rutaActual");
  var pageSize = ruta === "pension" ? 'A3' : 'A4';

    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'YYYY-MM-DD'
        // i18n: {
        //       previous: 'Anterior',
        //       next:     'Siguiente',
        //       months:   [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
        //       weekdays: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ]
        //   }
    });
    maxDate = new DateTime($('#max'), {
        format: 'YYYY-MM-DD'
        // i18n: {
        //       previous: 'Anterior',
        //       next:     'siguiente',
        //       months:   [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
        //       weekdays: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ]
        //   }
    });
 
    // DataTables initialisation
    var tablaCitas = $(".tablas").DataTable({
    "aLengthMenu":[[10, 50, 100, 500, 1000],[10, 50, 100, 500, 1000]],
    "responsive": true,
            "lengthChange": true,
            "processing" : true,
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
            },

     },

     "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                           "buttons": [
    {extend:"copy",exportOptions: {
                     columns: ':visible'
                },title: function() {
        return "Reportes  " +  ruta // Título dinámico con la fecha actual
    },text:'<i class="fa fa-copy"></i>&nbsp;&nbsp;Copiar',titleAttr:"Copiar",className:"btn-warning",},
      {extend:"csv",exportOptions: {
                     columns: ':visible'
                },title: function() {
        return "Reportes  " +  ruta// Título dinámico con la fecha actual
    },text:'<i class="fa fa-file-o"></i>&nbsp;&nbsp;CSV',titleAttr:"Descargar CSV",className:"btn btn-info"},
    {
    extend: "excel",
    exportOptions: {
        columns: ':visible'
    },
    title: function() {
        return "Reportes  " +  ruta// Título dinámico con la fecha actual
    },
    text: '<i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;Excel',
    titleAttr: "Exportar a Excel",
    className: "btn-success"
},
      {extend:"pdf",exportOptions: {
                columns: ':visible' // Exporta solo las columnas visibles
                }, title: function() {
        return "Reportes  " +  ruta; // Título dinámico con la fecha actual
    }, orientation: 'landscape', pageSize: pageSize ,text:'<i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF',titleAttr:"Exportar a PDF",className:"btn-danger", messageBottom:" ",customize:function(doc) {

                            doc.styles.title = {
                                color: '#4c8aa0',
                                fontSize: '30',
                                alignment: 'center'
                            }
                            doc.styles['td:nth-child(2)'] = { 
                                width: '100px',
                                'max-width': '100px'
                            },
                            doc.styles.tableHeader = {
                                fillColor:'#4c8aa0',
                                color:'white',
                                alignment:'center'

                            }
                            // doc.pageMargins = [20,60,20,20];
                            doc.content[1].margin = [100, 0, 100, 0]
            var now = new Date();
            var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
                          

                            doc.content.splice( 1, 0, {
                        margin: [ 0, 0, 0, 12 ],
                        alignment: 'center',
                        image:'data:image/png;base64,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'

                                } 


                                );
                         

              doc['footer']=(function(page, pages) {
              return {
                columns: [
                  {
                    alignment: 'left',
                    text: ['Creado en la fecha: ', { text: jsDate.toString() }]
                  },
                  {
                    alignment: 'right',
                    text: ['Pagina ', { text: page.toString() },  ' De ', { text: pages.toString() }]
                  }
                ],
                margin: 20
              }
            });

                        }
                      },
      {extend:"print",exportOptions: {
                    columns: ':visible'
                },title: function() {
        return "Reportes  " +  ruta // Título dinámico con la fecha actual
    },text:'<i class="fa fa-print"></i>&nbsp;&nbsp; Imprimir',titleAttr:"Imprimir",className:"btn-primary"},

                {
            extend: 'colvis',
            text: '<i class="fa fa-columns"></i> Columnas',
            titleAttr: 'Visibilidad de columnas',
            className: 'btn btn-default',
            sAlign: "left"
            // columns: ':not(:nth-child(7))' // Excluimos la columna Acciones
        }
                    ],
                   "initComplete": function() {
    var api = this.api();
    var selectOptions = {
        'estado pago': ['Aprobado', 'No aprobado'],
        'estado ruta': ['Aprobado', 'No aprobado'],
        'tipo ruta': ['completa', 'media','No aprobado'],
        'tipo almuerzo': ['diario', 'completo'],
        'estado almuerzo': ['Aprobado', 'No aprobado'],
        'estado pago pension': ['Aprobado', 'No aprobado'],
        'estado clases extracurriculares': ['Aprobado', 'No aprobado']
        // Agrega aquí más columnas y sus opciones si es necesario
    };

    api.columns().every(function() {
        var column = this;
        var footer = $(column.footer());
        var footerText = footer.text().trim().toLowerCase();

        // Columnas que deben tener un select
        var selectColumns = [
         'curso asignado',
         'jornada', 
         'sede', 
         'estado pago', 
         'estado ruta', 
         'tipo ruta', 
         'tipo almuerzo',
         'estado almuerzo',
         'estado pago pension', 
         'estado clases extracurriculares'
         ];

        if (selectColumns.includes(footerText)) {
            var select = $('<select><option value="">Buscar por ' + footer.text() + '</option></select>')
                .appendTo(footer.empty())
                .on('change', function() {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());
                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                });

            // Añadir opciones manualmente si están definidas en selectOptions
            if (selectOptions[footerText]) {
                selectOptions[footerText].forEach(function(option) {
                    select.append('<option value="' + option + '">' + option + '</option>');
                });
            } else {
                // Usar un Set para almacenar valores únicos para otras columnas
                var uniqueValues = new Set();

                column.data().each(function(d) {
                    uniqueValues.add(d);
                });

                // Convertir el Set a un array y ordenar
                var uniqueValuesArray = Array.from(uniqueValues).sort();

                // Añadir opciones al select
                uniqueValuesArray.forEach(function(value) {
                    select.append('<option value="' + value + '">' + value + '</option>');
                });
            }

            select.css('width', '100%');
        } else if (footerText !== 'acciones') {
            var input = $('<input type="text" placeholder="Buscar por ' + footer.text() + '" />')
                .appendTo(footer.empty())
                .on('keyup change clear', function() {
                    if (column.search() !== this.value) {
                        column.search(this.value).draw();
                    }
                });

            input.css('width', '100%');
        } else {
            footer.empty(); // Limpiar el footer de la columna de acciones
        }
    });
}

            

});
 
    // Refilter the table
 $(function() {
   moment.locale('es');
    
    var start = moment().subtract(29, 'days');
    var end = moment();


    function cb(start, end) {
        $('#reportrange span').html(start.format('D [de] MMMM, YYYY') + ' - ' + end.format('D [de] MMMM, YYYY'));
        minDate.val(start.format('YYYY-MM-DD'));
        maxDate.val(end.format('YYYY-MM-DD'));
        tablaCitas.draw();
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Hoy': [moment(), moment()],
           'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
           'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
           'Este mes': [moment().startOf('month'), moment().endOf('month')],
           'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        locale: {
            format: 'DD/MM/YYYY',
            separator: ' - ',
            applyLabel: 'Aplicar',
            cancelLabel: 'Cancelar',
            fromLabel: 'Desde',
            toLabel: 'Hasta',
            customRangeLabel: 'Rango personalizado',
            weekLabel: 'Sem',
            daysOfWeek: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            firstDay: 1
        }
    }, cb);

    cb(start, end);
});
});







/*=============================================
 //iCheck for checkbox and radio inputs
=============================================*/

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  checkboxClass: 'icheckbox_minimal-blue',
  radioClass   : 'iradio_minimal-blue'
})

/*=============================================
 //input Mask
=============================================*/

//Datemask dd/mm/yyyy
$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
//Datemask2 mm/dd/yyyy
$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//Money Euro
$('[data-mask]').inputmask()