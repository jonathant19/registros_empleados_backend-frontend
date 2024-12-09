<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Psy\CodeCleaner\ReturnTypePass;
use UserFactory;

class UsuariosController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth');
    }

    // public function PrimerUser()
    // {

    // User::create([

    //     'name'=>'Jonathan Torres',
    //     'email'=>'empleado@gmail.com',
    //     'password'=>Hash::make('123'),
    //     'rol'=>'Administrador' 
    //    ]);

    // }


    public function Inicio()
    {

        return view('modulos.Inicio');
    }

    public function MisDatos()
    {

        return view('modulos.users.Mis-Datos');
    }

    public function UpdateMisDatos(Request $request)
    {

        $datos = request();

        if (auth()->user()->email != request('email')) {

            if (request('password')) {

                $datos = request()->validate([

                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'email', 'unique:users'],
                    'password' => ['required', 'string', 'min:3'],
                ]);
            } else {

                $datos = request()->validate([

                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'email', 'unique:users'],

                ]);
            }
        } else {

            if (request('password')) {

                $datos = request()->validate([

                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'email',],
                    'password' => ['required', 'string', 'min:3'],
                ]);
            } else {

                $datos = request()->validate([

                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'email',],

                ]);
            }
        }
        if (isset($datos['password'])) {

            DB::table('users')->where('id', auth()->user()->id)->update(['name' => $datos["name"], 'email' => $datos["email"], 'password' => Hash::make($datos["password"])]);
        } else {

            DB::table('users')->where('id', auth()->user()->id)->update(['name' => $datos["name"], 'email' => $datos["email"]]);
        }

        return redirect('Mis-Datos');
    }

    public function index()
    {

        if (auth()->user()->rol != 'Administrador') {
            return redirect('Inicio');
        }

        $users = User::all();

        return view('modulos.users.Usuarios', compact('users'));
    }

    public function store(Request $request)
    {
        $datos = request()->validate([

            'name' => ['string', 'max:255'],
            'email' => ["email", 'unique:users'],
            'rol' => ["string"],
            'password' => ["string", "min:3"],

        ]);

        User::create([

            'name' => $datos["name"],
            'email' => $datos["email"],
            'rol' => $datos["rol"],
            'password' => Hash::make($datos["password"]),

        ]);

        return redirect('Usuarios');
    }

    public function edit(string $id)
    {

        if (auth()->user()->rol != 'Administrador') {
            return redirect('Inicio');
        }

        $users = User::all();

        $usuario = User::find($id);

        return view('modulos.users.Usuarios', compact('users', 'usuario'));
    }



    public function update(Request $request, $id_usuario)
    {

        $usuario = User::find($id_usuario);


        if ($usuario["email"] != request('email')) {

            if (request('password')) {

                $datos = request()->validate([

                    'name' => ['string', 'required', 'max:255'],
                    'rol' => ['required'],
                    'email' => ['required', 'email', 'unique:users'],
                    'password'=>['required','string', 'min:3'],

                ]);

            }else{

                $datos = request()->validate([

                    'name' => ['string', 'required', 'max:255'],
                    'rol' => ['required'],
                    'email' => ['required', 'email', 'unique:users'],

                ]);

            }

        }else{

                if (request('password')) {

                $datos = request()->validate([

                    'name' => ['string', 'required', 'max:255'],
                    'rol' => ['required'],
                    'email' => ['required', 'email'],
                    'password'=>['required','string', 'min:3'],

                ]);

            }else{

                $datos = request()->validate([

                    'name' => ['string', 'required', 'max:255'],
                    'rol' => ['required'],
                    'email' => ['required', 'email'],

                ]);

            }

        }

         if(request('password')){

            $clave = request('password');

            User::where('id', $id_usuario)->update([

                'name' =>$datos["name"],
                'rol' =>$datos["rol"],
                'email' =>$datos["email"],
                'password' =>Hash::make($clave),

            ]);

         }else{

            User::where('id', $id_usuario)->update([

                'name' =>$datos["name"],
                'rol' =>$datos["rol"],
                'email' =>$datos["email"],

            ]);
         }

         return redirect('Usuarios');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_usuario)
    {
        
        User::destroy(())
    }
}
