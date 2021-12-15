<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Cancha;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Reserva::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reserva = new Reserva();
        $reserva->fecha = $request->input('fecha');
        $reserva->hora = $request->input('hora');
        $reserva->cancha_id = $request->input('cancha');
        $reserva->usuario_id = $request->input('usuarioId');

        $reserva->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cancha="";
        $reservas = Reserva::where("usuario_id", "=", $id)->get();
        foreach ($reservas as  $reserva) {
            $canchas = Cancha::where("id", "=", $reserva->cancha_id)->get();
            foreach ($canchas as $cancha) {

                $reserva->cancha_id = $cancha->nombre;

            }
        }
        return $reservas;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = "";
        $reservas = Reserva::where("cancha_id", "=", $id)->get();
        foreach ($reservas as  $reserva) {
            $users = User::where("id", "=", $reserva->usuario_id)->get();
            foreach ($users as $user) {

                $reserva->usuario_id = $user->name;

            }
        }
        return $reservas;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Reserva = Reserva::findOrFail($id);
        $Reserva->delete();
    }
}
