@extends('layouts.admin')

@section('content')

    <div class="content">
        {{-- <h1>Listado de eventos</h1> --}}

        @if ($message = Session::get('mensaje'))
            <script>
                Swal.fire({
                    title: 'Listo',
                    text: "{{$message}}",
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card  card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Eventos</b></h3>
                        {{-- <div class="card-tools">
                            <a href="{{url('/eventos/create')}}" class="btn btn-primary">
                                <i class="bi bi-file-plus"></i>Agregar Nuevo Evento
                            </a>
                        </div> --}}
                    </div>

                    <div class="card-body" style="display: block">
                        <table id="example1" class="table table-bordered table-striped table-sm" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Organizador</th>
                                    <th>Tematica</th>
                                    <th>Fecha</th>
                                    <th>Horario</th>
                                    <th>Estado</th>
                                    <th>Creado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador = 0;?>
                                @foreach ($eventos as $evento)
                                    <tr>
                                        <td><?php echo $contador = $contador + 1 ?></td>
                                        <td>{{$evento -> organizador}}</td>
                                        <td>{{$evento -> tematica}}</td>
                                        <td>{{$evento -> fecha}}</td>
                                        <td>{{$evento -> horario}}</td>
                                        <td>{{$evento -> estado}}</td>
                                        <td>{{ $evento->created_at->toDateString()}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="{{url('eventos', $evento->id)}}" type="button" class="btn btn-success"><i class="bi bi-eye"></i></a>
                                                <a href="{{route('eventos.edit', $evento->id)}}" type="button" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                                                <form action="{{url('eventos', $evento->id)}}" method="POST">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(function () {
                                    $("#example1").DataTable({
                                        "pageLength": 10,
                                        "language": {
                                            "emptyTable": "No hay información",
                                            "info": "Mostrando INICIO a FIN de TOTAL Eventos",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Miembros",
                                            "infoFiltered": "(Filtrado de MAX total Eventos)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar MENU Eventos",
                                            "loadingRecords": "Cargando...",
                                            "processing": "Procesando...",
                                            "search": "Buscador:",
                                            "zeroRecords": "Sin resultados encontrados",
                                            "paginate": {
                                                "first": "Primero",
                                                "last": "Ultimo",
                                                "next": "Siguiente",
                                                "previous": "Anterior"
                                            }
                                        },
                                        "responsive": true, "lengthChange": true, "autoWidth": false,
                                        buttons: [{
                                            extend: 'collection',
                                            text: 'Reportes',
                                            orientation: 'landscape',
                                            buttons: [{
                                                text: 'Copiar',
                                                extend: 'copy',
                                            }, {
                                                extend: 'pdf'
                                            },{
                                                extend: 'csv'
                                            },{
                                                extend: 'excel'
                                            },{
                                                text: 'Imprimir',
                                                extend: 'print'
                                            }
                                            ]
                                        },
                                            {
                                                extend: 'colvis',
                                                text: 'Visor de columnas',
                                                collectionLayout: 'one-column'
                                            }
                                        ],
                                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                                });
                          </script>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection