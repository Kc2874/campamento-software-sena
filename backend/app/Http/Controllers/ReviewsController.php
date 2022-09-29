<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;

class ReviewsController  extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response()->json(["success"=>true,"data"=>Reviews::all()],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $id)
    {
       //verificar los datos del payload
       //guardar el nuevo bootcamp
      return response()->json(["success"=>true,"data"=>Reviews::create($id->all())],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(["success"=>true,"data"=>Reviews::find($id)],200);
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
       //1. Seleccionar el bootcamp a actualizar
       $b = Reviews::find($id);
       //2.Actualizar el bootcamp
       $b->update($request->all());
       //3.Enviar el bootcamp actualizado
       return response()->json([
        "success"=>true,
        "data"=>$b],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $b= Reviews::find($id);
        $b->delete();
        return response()->json(["success"=>true,"data"=>$b]);
    }
}
