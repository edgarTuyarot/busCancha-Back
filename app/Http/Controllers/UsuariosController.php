<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;

class UsuariosController extends Controller
{
    public function login(Request $request)
    {
        $respuesta = [];
        $mail = $request->input("email");
        $pass = $request->input("password");
        $users = DB::table('users')->where('email', '=', $mail)->get();
        foreach ($users as $user) {

            if (password_verify($pass, $user->password)) {
                array_push($respuesta,$user->id,$user->name,$user->email,$user->prop,$user->id_cancha);



            } else {
                array_push($respuesta,1);

            };

        }
        return $respuesta;
        /*     if(password_verify($pass,$passHash->password)){

        }else{
            return "usuario no encontrado";
        } */

    }




















    //
}
