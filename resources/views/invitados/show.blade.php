
@extends('layouts.admin')

@section('content')
    <div class="content">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-11">
                <div class="card  card-outline card-success">
                    <div class="card-body" style="display: block">
                        <form action="{{ url('/invitados')  }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Correo</label><b>*</b>
                                        <input type="text" name="correo" value="{{$invitado->correo}}" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre</label><b>*</b>
                                        <input type="text" name="nombre" value="{{$invitado->nombre}}" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellido</label><b>*</b>
                                        <input type="text" name="apellido" value="{{$invitado->apellido}}" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">DNI</label><b>*</b>
                                        <input type="text" name="dni" value="{{$invitado->dni}}" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Telefono</label><b>*</b>
                                        <input type="text" name="telefono" value="{{$invitado->telefono}}" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Institucion</label><b>*</b>
                                        <input type="text" name="institucion" value="{{$invitado->institucion}}" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Cargo / Jerarquia / Puesto </label><b>*</b>
                                        <input type="text" name="cargo" value="{{$invitado->cargo}}" class="form-control" disabled>
                                    </div>
                                </div>
                                <input type="hidden" name="asistencia" value="1">
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Atras</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
