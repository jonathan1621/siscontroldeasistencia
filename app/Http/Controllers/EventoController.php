<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class EventoController extends Controller
{
    public function index() {

        $eventos = Evento::all()->sortByDesc('id');
        return view('eventos.index', ['eventos' => $eventos]);
    }

    public function create() {
        return view('eventos.create');
    }

    public function store(Request $request) { //es un formulario que tiene que recibir informacion

        //Validar cada campo con required
        $request->validate([
            'organizador' => 'required',
            'tematica'  => 'required',
            'fecha'  => 'required',
            'horario'  => 'required',
        ]);

        $evento = new Evento();

        $evento->organizador = $request->organizador;
        $evento->tematica = $request->tematica;
        $evento->fecha = $request->fecha;
        $evento->horario = $request->horario;
        $evento->estado = '1';

        $evento->save();

        return redirect()->route('eventos.index')->with('mensaje','Evento registrado');

    }

    public function show($id) {
        $evento = Evento::findOrFail($id);
        return view ('eventos.show', ['evento'=>$evento]);
    }

    public function edit($id) {
        $evento = Evento::findOrFail($id);
        return view('eventos.edit', ['evento'=>$evento]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'organizador' => 'required',
            'tematica' => 'required',
            'horario' => 'required',
            'fecha' => 'required',
        ]);

        $evento = Evento::find($id);

        $evento->organizador = $request->organizador;
        $evento->tematica = $request->tematica;
        $evento->horario = $request->horario;
        $evento->fecha = $request->fecha;

        $evento->save();  //modificar cartel el final

        return redirect()->route('eventos.index')->with('mensaje','Se actualizo de manera correcta');

    }

    public function destroy($id) {
        Evento::destroy($id);

        return redirect()->route('eventos.index')->with('mensaje', 'Se elimino el evento de manera correcta');
    }
}
