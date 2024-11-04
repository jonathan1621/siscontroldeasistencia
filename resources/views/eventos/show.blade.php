@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-11">
                <div class="card  card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Datos del evento</b></h3>
                    </div>

                    <div class="card-body" style="display: block">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Organizador</label><b>*</b>
                                    <input type="text" name="organizador" value="{{$evento->organizador}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tematica</label><b>*</b>
                                    <input type="text" name="tematica" value="{{$evento->tematica}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Horario</label><b>*</b>
                                    <input type="text" name="horario" value="{{$evento->horario}}" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Fecha</label><b>*</b>
                                    <input type="date" name="fecha" value="{{$evento->fecha}}" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>Invitados</b></h3>
                    </div>
                    <div class="card-body" style="display: block">
                        <table id="example1" class="table table-bordered table-striped table-sm" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>DNI</th>
                                    <th>Cargo</th>
                                    <th>Institucion</th>
                                    <th>Acciones</th>
                                    <th>Asistencia</th>
                                    <th>Ticket</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador = 0;?>
                                @foreach ($evento->invitados as $invitado)
                                    <tr>
                                        <td><?php echo $contador = $contador + 1 ?></td>
                                        <td>{{$invitado -> nombre}}</td>
                                        <td>{{$invitado -> apellido}}</td>
                                        <td>{{$invitado -> dni}}</td>
                                        <td>{{$invitado -> cargo}}</td>
                                        <td>{{$invitado -> institucion}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                {{-- {{$invitado -> id}} --}}
                                                <a href="{{url('invitados/'. $invitado->id)}}" type="button" class="btn btn-success" data-bs-toggle="tooltip" title="Ver invitado"><i class="bi bi-eye"></i></a>
                                                <a href="{{route('invitados.edit', $invitado->id)}}" type="button" class="btn btn-warning" data-bs-toggle="tooltip" title="Modificar invitado"><i class="bi bi-pencil"></i></a>

                                                <form id="delete-form-{{ $invitado->id }}" action="{{url('invitados', $invitado->id)}}" method="POST">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <button type="button" class="btn btn-danger delete-button" data-id="{{ $invitado->id }}" data-bs-toggle="tooltip" title="Eliminar invitado">
                                                        <i class="bi bi-trash">
                                                        </i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ route('editasistencia', $invitado->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-{{ $invitado->asistencia ? 'success' : 'danger' }}">
                                                    {{ $invitado->asistencia ? 'Presente' : 'Ausente' }}
                                                </button>
                                            </form>

                                        </td>
                                        <td>
                                            <a href="" type="button" class="btn btn-primary btn" style="width: 80%"><i class="bi bi-person-bounding-box"></i></a>
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
                                            "info": "Mostrando INICIO a FIN de TOTAL Invitados",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Miembros",
                                            "infoFiltered": "(Filtrado de MAX total Invitados)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar MENU Invitados",
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
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Atras</a>
                <a href="{{ route('invitados.create', ['id' => $evento->id]) }}" type="button" class="btn btn-success" data-bs-toggle="tooltip" title="Agregar Invitado">Agregar Invitado</a>
            </div>
        </div>
    </div>
@endsection
