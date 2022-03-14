<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'posts_id'  => 'required',
            'contenido' => 'required',
            
        ]);

        $result = DB::table('comentarios')-> insert([
            'Posts_id' => $data['posts_id'],
            'contenido'     => $data['contenido'],
            'created_at'    => Carbon::now()
        ]);

        if($result){
            return "El comentario fue creado";
        }else{
            return "El comentario no pudo ser creado";
        }
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
        $comentariosData = Comentarios::find($id);
        $comentariosData->Posts_id = $request['posts_id'] ? $request['posts_id'] : $comentariosData->Posts_id;
        $comentariosData->contenido = $request['contenido'] ? $request['contenido'] : $comentariosData->contenido;
        $comentariosData->updated_at    = Carbon::now();
        
        if($comentariosData->update()){
            return "El Comentario se ha actualizado correctamente";
        }else{
            return "No se pudo actualizar el comentario";
        }

    }

    /**
     * Muestra los valores de un comentario específico
     *
     * @param  int  $id id del comentario
     * @return \Illuminate\Http\Response
     */
    public function ver($id)
    {
        $verComentarios = DB::select('SELECT * FROM comentarios WHERE id = ?', [$id]);

        if($verComentarios){
            return $verComentarios;
        }else{
            return "No existe el comentario";
        }
    }

    /**
     * Muestra todos los registros de la tabla comentarios
     *
     * @return \Illuminate\Http\Response
     */
    public function verTodo()
    {
        $verTodo = DB::select('SELECT * FROM comentarios');

        if($verTodo){
            return $verTodo;
        }else{
            return "No hay registros";
        }
    }


    /**
     * Muestra los datos de un comentario específico a editar
     * se usa el mismo método ver() ya que cumple la misma función para mostrar los datos
     * @param  int  $id id del comentario
     * @return \App\Http\Controllers\PostsController@ver
     */
    public function edit($id)
    {
       return $this->ver($id);
    }




    /**
     * Eliminar un comentario específico
     *
     * @param  int  $id id del comentario
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $eliminarComentario = Comentarios::find($id);
        
        if($eliminarComentario->delete()){
            return "El comentario ha sido eliminado";
        }else{
            return "El comentario no se pudo eliminar";
        }
    }
}
