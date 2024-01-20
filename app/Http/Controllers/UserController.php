<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $ordenar=false;
        if(empty($request->name) && empty($request->email)){ //Ambos vacios -> Redirige a la 
            if($request->ordenar != ""){
                $users = App\User::orderBy("name")->paginate();
                $ordenar=true;
            }else{
                $users = App\User::paginate(5);
            }
        }else if (empty($request->name)){ //Name vacio -> Busca por email
            if($request->ordenar != ""){
                $users = App\User::where('email', 'like', '%'.$request->email.'%')->orderBy("name")->paginate();
                $ordenar=true;
            }else{
                $users = App\User::where('email', 'like', '%'.$request->email.'%')->paginate();
            }
        }else if(empty($request->email)){ //Email vacio -> Busca por name 
            if($request->ordenar != ""){
                $users = App\User::where('name', 'like', '%'.$request->name.'%')->orderBy("name")->paginate();
                $ordenar=true;
            }else{
                $users = App\User::where('name', 'like', '%'.$request->name.'%')->paginate();
            } 
        }else{   //Ninguno vacio -> Busca por los dos
            if($request->ordenar != ""){
                $users = App\User::where('email', 'like', '%' . $request->email . '%')->where('name',$request->name)->orderBy("name")->paginate();
                $ordenar=true;
            }else{
                $users = App\User::where('email', 'like', '%' . $request->email . '%')->where('name',$request->name)->paginate();
            }
            
        }

        return view('users.lista', compact('users','ordenar'));
    }

    public function delete ($id)
    {
        $userAEliminar = App\User::findOrFail($id);
        $userAEliminar->delete();

        return back();
    }

    public function create()
    {
        return view('users.crear');
    }

    public function save(Request $req)
    {
        $req->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|unique:users|email|min:2|max:255',
            'password' => 'required|min:8',
            'telefono' => 'required|integer',
            'direccion' => 'required|min:2|max:255',
            'fechaNacimiento' => 'required|date'
        ]);

        $userACrear = new App\User();

        $userACrear->name = $req->name;
        $userACrear->email = $req->email;
        $userACrear->password = Hash::make($req->password);
        $userACrear->telefono = $req->telefono;
        $userACrear->direccion = $req->direccion;
        $userACrear->fechaNacimiento = $req->fechaNacimiento;
        $userACrear->role_id = App\Role::where('name','client')->first()->id;
        //$userACrear->esAdmin = $req->esAdmin;

        $userACrear->save();

        return back()->with('message', 'Usuario '.$userACrear->name. ' creado correctamente!');
    }

    public function edit ($id)
    {
        $userAModificar = App\User::findOrFail($id);

        return view('users.modificar', compact('userAModificar'));
    }

    public function update ($id, Request $req)
    {   
         
        $req->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|min:2|max:255',
            
            'telefono' => 'required|integer',
            'direccion' => 'required|min:2|max:255',
            'fechaNacimiento' => 'required|date'
        ]);
        
        $userAModificar = App\User::findOrFail($id);

        $userAModificar->name = $req->name;
        $userAModificar->email = $req->email;
        $userAModificar->telefono = $req->telefono;
        $userAModificar->direccion = $req->direccion;
        $userAModificar->fechaNacimiento = $req->fechaNacimiento;
        
        
        $userAModificar->save();

        return back()->with('message', 'Usuario '.$userAModificar->name.' modificado correctamente!');
    }

    
}
