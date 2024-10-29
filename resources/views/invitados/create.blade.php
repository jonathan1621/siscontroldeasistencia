
@extends('layouts.admin')

@section('content')
    <div class="content">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-11">
                <div class="card  card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title"><b>AGREGAR INVITADO - Completar campos</b></h3>
                    </div>
                    {{-- <p>ID del evento: {{ $id }}</p> --}}
                    <div class="card-body" style="display: block">
                        <form action="{{ url('/invitados')  }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id_evento" value={{ $id }}>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Correo</label><b>*</b>
                                        <input type="text" name="correo" value="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre</label><b>*</b>
                                        <input type="text" name="nombre" value="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellido</label><b>*</b>
                                        <input type="text" name="apellido" value="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">DNI</label><b>*</b>
                                        <input type="text" name="dni" value="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Telefono</label><b>*</b>
                                        <input type="text" name="telefono" value="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Institucion</label><b>*</b>
                                        <input type="text" name="institucion" value="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Cargo / Jerarquia / Puesto </label><b>*</b>
                                        <input type="text" name="cargo" value="" class="form-control" required>
                                    </div>
                                </div>
                                <input type="hidden" name="asistencia" value="1">
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
                                        <button href="{{ url()->previous() }}" type="submit" class="btn btn-primary">Guardar</button>
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
