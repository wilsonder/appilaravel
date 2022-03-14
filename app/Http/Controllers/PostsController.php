<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Posts;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index(){
    }

    /**
     * Crea y guarda un nuevo post en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'categoria_id' => 'required',
            'titulo'       => 'required',
            'contenido'    => 'required',
        ]);

        $result = DB::table('posts')-> insert([
            'Categorias_id' => $data['categoria_id'],
            'titulo'        => $data['titulo'],
            'contenido'     => $data['contenido'],
            'created_at'    => Carbon::now()
        ]);

        if($result){
            return "El post fue creado";
        }else{
            return "El post no pudo ser creado";
        }

    }

    /**
     * Actualiza un post específico en la base datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id id del post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $postData = Posts::find($id);
        $postData->Categorias_id = $request['categoria_id'] ? $request['categoria_id'] : $postData->Categorias_id;
        $postData->titulo        = $request['titulo'] ? $request['titulo'] : $postData->titulo;
        $postData->contenido     = $request['contenido'] ? $request['contenido'] : $postData->contenido;
        $postData->updated_at    = Carbon::now();
        
        if($postData->update()){
            return "El post se ha actualizado correctamente";
        }else{
            return "No se pudo actualizar el post";
        }

    }

    /**
     * Muestra los valores de un post específico
     *
     * @param  int  $id id del post
     * @return \Illuminate\Http\Response
     */
    public function ver($id)
    {
        $verPosts = DB::select('SELECT * FROM posts WHERE id = ?', [$id]);

        if($verPosts){
            return $verPosts;
        }else{
            return "No existe el post";
        }
    }

    /**
     * Muestra todos los registros de la tabla posts
     *
     * @return \Illuminate\Http\Response
     */
    public function verTodo()
    {
        $verTodo = DB::select('SELECT * FROM posts');

        if($verTodo){
            return $verTodo;
        }else{
            return "No hay registros";
        }
    }

    /**
     * Muestra los datos de un post específico a editar
     * se usa el mismo método ver() ya que cumple la misma función para mostrar los datos
     * @param  int  $id id del post
     * @return \App\Http\Controllers\PostsController@ver
     */
    public function edit($id)
    {
       return $this->ver($id);
    }

    /**
     * Eliminar un post específico
     *
     * @param  int  $id id del post
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $eliminarPost = Posts::find($id);
        
        if($eliminarPost->delete()){
            return "El post ha sido eliminado";
        }else{
            return "El post no se pudo eliminar";
        }
    }
}
