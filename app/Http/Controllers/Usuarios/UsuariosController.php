<?php

namespace App\Http\Controllers\Usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Perfil;
use App\Estado;

class UsuariosController extends Controller
{
    
  /*  public function __construct(){

        $this->middleware('auth');
    }
    */
    public function index(request $request)
    {
      $usuarios = User::nombres($request->name)->email($request->email)->perfil($request->perfil_id)->Estado($request->estado_id)->paginate(10);
      $perfiles= Perfil::orderBy('nombre','asc')->pluck('nombre','id');
      $estados = Estado::orderBy('nombre','asc')->pluck('nombre','id');
        return view('admin.usuarios.index',compact('usuarios','perfiles','estados'));
    }

   
    public function create()
    {
        $perfiles = Perfil::orderBy('nombre','asc')->pluck('nombre','id');
        $estados = Estado::orderBy('nombre','asc')->pluck('nombre','id');
        return view('admin.usuarios.crear',compact('perfiles','estados'));
    }

   
    public function store(Request $request)
    {
        //Validar los campos
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'perfil_id' => 'required',
            'estado_id' => 'required',
            'foto'=>'required|mimes:jpeg,jpg,png|max:3000'

        ]);
        //subir la foto a la carpeta public
        $foto = $request-> file('foto');
        $ruta = public_path().'/fotos';
        $nombrefoto= uniqid()."-".$foto->getClientOriginalName();
        $foto->move($ruta,$nombrefoto);



        //Insertar los datos
        $usuario = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'perfil_id'=>$request->perfil_id,
            'estado_id'=>$request->estado_id,
            'foto'=>$nombrefoto
        ]);

        $mensaje = $usuario?'Usuario creado ok':'No se pudo crear el usuario';
        return redirect()->route('usuarios.index')->with('mensaje',$mensaje);

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $usuario = User::find($id);
        $perfiles = Perfil::orderBy('nombre','asc')->pluck('nombre','id');
        $estados = Estado::orderBy('nombre','asc')->pluck('nombre','id');
        return view('admin.usuarios.editar',compact('usuario','perfiles','estados'));
    }

    
    public function update(Request $request, $id)
    {
        //Validar los campos
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'perfil_id' => 'required',
            'estado_id' => 'required'
        ]);

        //Actualizar el usuario
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        //se pregunta si se quiere cambiar la contraseña - desde admin
        if($request->password)
            $usuario->password = Hash::make($request->password);
        $usuario->perfil_id = $request->perfil_id;
        $usuario->estado_id = $request->estado_id;
        $usuario->save();

        $mensaje = $usuario?'Usuario actualizado ok':'No se pudo actualizar';
        return redirect()->route('usuarios.index')->with('mensaje',$mensaje);
    }

    
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->estado_id = 2;
        $usuario->save();

        $mensaje = $usuario?'Usuario inactivado':'No se pudo inactivar';
        return redirect()->route('usuarios.index')->with('mensaje',$mensaje);
     }

     public function exportarpdf()

     {

        $usuarios=User::all();
        $pdf = \App::make('dompdf.wrapper');
        $vista= \View('admin.usuarios.pdf',compact('usuarios'))->render();
        $pdf->loadHTML($vista);
        return $pdf->download('usuarios.pdf');

     }
     public function exportarxls(){
        
        Excel::create('usuarios',function($excel){
        $excel->sheet('usuarios',function($sheets){
            $usuarios=User::all();
            $sheets->fromArray($usuarios);

        });
        })->export('xlsx');
        
       
     }
     





}

