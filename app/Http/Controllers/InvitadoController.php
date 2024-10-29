<?php

namespace App\Http\Controllers;

use App\Models\Invitado;
use Illuminate\Http\Request;

class InvitadoController extends Controller
{
    public function index(){
        $invitados = Invitado::all();
        return view('invitados.index', ['invitados'=>$invitados]);
    }

    public function create($id = null) {

        return view('invitados.create', compact('id'));
    }

    public function store(Request $request) {

        $invitado = new Invitado();

        $request->validate([
            'correo' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
            'institucion' => 'required',
            'cargo' => 'required',
            //'asistencia' => '1'
        ]);

        $invitado->id_evento = $request->id_evento;
        $invitado->correo = $request->correo;
        $invitado->nombre = $request->nombre;
        $invitado->apellido = $request->apellido;
        $invitado->dni = $request->dni;
        $invitado->telefono = $request->telefono;
        $invitado->institucion = $request->institucion;
        $invitado->cargo = $request->cargo;
        $invitado->asistencia = '1';

        $invitado->save();

        //return redirect()->route('invitados.create')->with('success', 'Invitado creado con éxito');

        return redirect()->to(url('eventos/' . $invitado->id_evento))->with('mensaje', 'Se actualizó de manera correcta');
    }

    public function show($id) {
        $invitado = Invitado::findOrFail($id);
        return view('invitados.show', ['invitado'=>$invitado] );
    }

    public function edit($id) {
        $invitado = Invitado::findOrFail($id);
        return view('invitados.edit', ['invitado'=>$invitado]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'correo' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
            'institucion' => 'required',
            'cargo' => 'required',
            'asistencia' => 'required',
        ]);

        $invitado = Invitado::find($id);

        $invitado->correo = $request->correo;
        $invitado->nombre = $request->nombre;
        $invitado->apellido = $request->apellido;
        $invitado->dni = $request->dni;
        $invitado->telefono = $request->telefono;
        $invitado->institucion = $request->institucion;
        $invitado->cargo = $request->cargo;
        $invitado->asistencia = $request->asistencia;

        $invitado->save();  //modificar cartel el final

        //return redirect()->to(url('eventos', $id))->with('mensaje', 'Se actualizó de manera correcta');
        return redirect()->to(url('eventos/' . $invitado->id_evento))->with('mensaje', 'Se actualizó de manera correcta');

    }

    // public function destroy($id) {
    //     // Invitado::where('id_evento', $id)->delete();

    //     Invitado::destroy($id);

    //     return redirect()->to(url('eventos/' . $invitado->id_evento))->with('alerta_borrado', 'Se elimino el evento de manera correcta');

    // }

    public function destroy($id) {
        // Eliminar el invitado según el ID
        $invitado = Invitado::findOrFail($id);  // Encuentra el invitado o muestra un error si no existe
        $idEvento = $invitado->id_evento;  // Guarda el ID del evento antes de borrar el invitado

        $invitado->delete();  // Borra el invitado

        // Redirecciona de vuelta a la página del evento
        return redirect()->to(url('eventos/' . $idEvento))->with('alerta_borrado', 'Se eliminó el invitado de manera correcta');
    }

}
