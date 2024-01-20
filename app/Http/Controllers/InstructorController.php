<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class InstructorController extends Controller
{
    
    public function index(Request $request)
    {
        $ordenar = false;
        if($request->has('ordenar')){
            $instructors = App\Instructor::orderBy('name')->paginate();
            $ordenar=true;
        }else{
            $instructors = App\Instructor::paginate(5);
        }

        return view ('instructors.lista', compact('instructors','ordenar'));
    }

    //Borra un instructor dado un id
    public function delete($id)
    {
        $instructorAEliminar = App\Instructor::findOrFail($id);
        $instructorAEliminar->delete();
        return back();
    }

    public function create()
    {
        return view('instructors.crear');
    }

    public function save(Request $req)
    {
        $req->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|unique:instructors|email|min:2|max:255',
            'telefono' => 'required|integer',
            'direccion' => 'required|min:2|max:255',
            'fechaNacimiento' => 'required|date'
        ]);

        $instructorACrear = new App\Instructor;
        $instructorACrear->email = $req->email;
        $instructorACrear->name = $req->name;
        $instructorACrear->telefono = $req->telefono;
        $instructorACrear->direccion = $req->direccion;
        $instructorACrear->fechaNacimiento = $req->fechaNacimiento;

        $instructorACrear->save();

        return back()->with('message', 'Instructor '.$instructorACrear->name.' creado correctamente!');
    }

    public function edit($id)
    {
        $instructorAModificar = App\Instructor::findOrFail($id);
        return view('instructors.modificar', compact('instructorAModificar'));
    }

    public function update($id, Request $req)
    {
        $req->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|min:2|max:255',
            'telefono' => 'required|integer',
            'direccion' => 'required|min:2|max:255',
            'fechaNacimiento' => 'required|date'
        ]);

        $instructorAModificar = App\Instructor::findOrFail($id);
        $instructorAModificar->email = $req->email;
        $instructorAModificar->name = $req->name;
        $instructorAModificar->telefono = $req->telefono;
        $instructorAModificar->direccion = $req->direccion;
        $instructorAModificar->fechaNacimiento = $req->fechaNacimiento;

        $instructorAModificar->save();

        return back()->with('message', 'Instructor '.$instructorAModificar->name.' modificado correctamente!');    
    }

    /*
    public function searchInstructor(Request $req)
    {
        if(empty($req->nombre) && empty($req->email) && empty($req->email) && empty($req->email))
    }
    **/
}
