@extends('layouts.admin')

@section('content')
    <div class="content" style="margin-left: 20px">
        <h1>Mostrar evento</h1><br>
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
                        <hr>
                        {{-- <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <a href="" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
