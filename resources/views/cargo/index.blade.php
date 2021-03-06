@extends('admin.layout')

@section('contenido')

<div id="tabla" class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">Administración de Cargos</h3>
        <p class="text-muted m-b-30">Gestionar Cargos</p>
        <div class="table-responsive">
            <table id="listusers" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cargo</th>
                        <th>Detalle</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Cargo</th>
                        <th>Detalle</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($cargo as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->nombre }}</td>
                                <td>{{ $car->descripcion }}</td>
                                <td>{{ trans_choice('mensajes.vigencia', $car->estado ) }}</td>
                                @can('cargo.show')
                                <td width="10px">
                                    <a href="{{ route('cargo.show', $car->id) }}" 
                                    class="btn btn-success btn-circle btn-lg">
                                      <i class="fa fa-check"></i>
                                    </a>
                                </td>
                                @endcan
                                @can('cargo.edit')
                                <td width="10px">
                                    <a href="{{ route('cargo.edit', $car->id) }}"><span class="btn btn-warning btn-circle btn-lg"><i class="ti-pencil-alt"></i></span></a>
                                </td>
                                @endcan
                                @can('cargo.destroy')
                                <td width="10px">

                                    {!! Form::open(['route' => ['cargo.destroy', $car->id], 
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-danger btn-circle btn-lg"><i class="ti-trash"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                                @endcan
                            </tr>
                            @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>



<link href = "{{ URL::asset('plugins/bower_components/datatables/jquery.dataTables.min.css')   }}" rel="stylesheet" type="text/css"   />
<link href = "{{ URL::asset('plugins/DataTables/Buttons-1.5.1/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css"   />


<script  src="{{ URL::asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('plugins/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('plugins/DataTables/Buttons-1.5.1/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('plugins/DataTables/Buttons-1.5.1/js/buttons.flash.min.js') }}"></script>
<script src="{{ URL::asset('plugins/DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
<script src="{{ URL::asset('plugins/DataTables/pdfmake-0.1.32/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('plugins/DataTables/pdfmake-0.1.32/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('plugins/DataTables/Buttons-1.5.1/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('plugins/DataTables/Buttons-1.5.1/js/buttons.print.min.js') }}"></script>
<!-- end - This is for export functionality only -->
<script>

$('#listusers').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print',{
            text: 'Crear Cargo',
            action: function ( e, dt, node, config ) {
                 window.location.href = '{{ route("cargo.create") }}';
            }
        }

    ],

    columnDefs: [{
            "targets": [4, 5, 6],
            "orderable": false
        }],

    language: {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "buttons": {
            "copy": 'Copiar',
            "csv": 'Exportar a CSV',
            "print": 'Imprimir'},
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});

</script>


@endsection