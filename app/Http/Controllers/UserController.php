<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){

        $users = User::all(
        );//1 es publica

      //  dd($users);

        return view('usuarios.operadores.lista', ['users' => $users]);
    }

    public function agregarForm(){

        $secciones= DB::table('seccions')->get();
        $roles= DB::table('roles')->get();      

        return view("usuarios.operadores.agregarForm")->with([           
            'secciones'=>$secciones,
            'roles'=>$roles,                       
        ]);
        
    }
    public function grabar(Request $request){
       $rules=[
            'name' => ['required', 'string'],
            'apellido' => ['required', 'string', 'max:80'],           
            'email' => ['required', 'string', 'max:100', 'unique:App\Models\User,email'], 
            //[Rule::unique('users')->ignore($usuario->id)],
            'password'=>['required', 'between:5,15', 'regex:^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])^'],
             
          ];
    
   $customMessages = [
            'name.required' => '¡Complete el campo usuario!',          
            'apellido.required' => 'Complete el campo apellido',
            'apellido.max' => 'El apellido no debe superar los 80 caracteres',
           
            'email.required' => '¡Complete el campo email!',
            'email.max' => '¡El email no puede superar los 100 caracteres!',
            'email.unique' => '¡El email ya existe en nuestra base de datos!',
            'password.required' => '¡Complete el campo contraseña!',
            'password.between' => '¡La contraseña debe tener entre 5 y 15 caracteres!',
            'password.regex' => 'La contraseña debe contener por lo menos una Mayúscula, una minúscula y un número',

        ];
        
        request()->validate($rules, $customMessages);
        //request()->validate($rules);
        /*
        
        $user->nombre=$request->input('name');
        $user->apellido=$request->input('apellido');
        if($request->input('password')!=null){
       
            

        }  
        
        */
        $user=User::create(request()->all());
        $user->password= Hash::make($request->input('password'));
        $user->save();

        $roles= DB::table('roles')->get();

        foreach($roles as $rol){

            if($request->input('rol'.$rol->id)){

                //$usuario->roles()->attach([$request->input('role')]);
               // dd($rol->id);
                DB::table('role_user')->insert([
                        ['role_id'=>$rol->id, 'user_id'=>$user->id]
                    ]);
            }


        }

        session()->flash('success', 'El operador se creó con éxito');
        return redirect("operadores");
    }

    public function editarForm($id){

        $user=User::findOrFail($id);

        $secciones= DB::table('seccions')->get();
        $roles= DB::table('roles')->get();
        $role_user=DB::table('role_user')->where('user_id', $id)->get();

        return view("usuarios.operadores.editarForm")->with([
            'user'=>$user,
            'secciones'=>$secciones,
            'roles'=>$roles,
            'role_user'=>$role_user,            
        ]);
    }

    public function editarOperador($id, Request $request){       
       
        /*
        $request->validate([
            'pregunta' => 'required|max:300',
            'respuesta' => 'required|max:300',
            'posicion' => 'numeric'
        ]);*/

        
        $user=User::findOrFail($id);

        //$user->update(request()->all());
        $user->name=$request->input('name');
        $user->apellido=$request->input('apellido');
        $user->facturas_dias=$request->input('facturas_dias');
        $user->solo_sus_fact=$request->input('solo_sus_fact');

        if($request->input('password')){
            $user->password= Hash::make($request->input('password'));
        }
        
        $user->save();

      //  $secciones= DB::table('seccions')->get();
        $roles= DB::table('roles')->get();
        $role_user=DB::table('role_user')->where('user_id', $id)->delete();
       
        //$role_user->delete();

        foreach($roles as $rol){

            if($request->input('rol'.$rol->id)){

               // dd($rol->id);
                DB::table('role_user')->insert([
                        ['role_id'=>$rol->id, 'user_id'=>$id]
                    ]);
            }


        }

        

        session()->flash('success', 'El operador se editó con éxito');

        return redirect("operadores");


    }


    public function eliminarForm($id){

        $user=User::findOrFail($id);
        

       return view("usuarios.operadores.eliminarForm")->with([
            'user'=>$user,         
        ]);
    }

    public function eliminar($id){
        $user=User::findOrFail($id);
        $user->delete();
        session()->flash('success', 'La usuario se eliminó con éxito');
        return redirect("operadores");

    }

}
