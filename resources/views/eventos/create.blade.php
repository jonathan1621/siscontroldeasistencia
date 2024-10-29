@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-11">
                <div class="card  card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><b>CREACION DE NUEVO EVENTO - Completar campos</b></h3>
                    </div>

                    <div class="card-body" style="display: block">
                        <form action="{{url('/eventos')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Organizador</label><b>*</b>
                                        <input type="text" name="organizador" value="{{old('organizador')}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tematica</label><b>*</b>
                                        <input type="text" name="tematica" value="{{old('tematica')}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Horario</label><b>*</b>
                                        <input type="text" name="horario" value="{{old('horario')}}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha</label><b>*</b>
                                        <input type="date" name="fecha" value="{{old('fecha')}}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <a href="" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Guardar</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
