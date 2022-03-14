<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
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

    public function create(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            
        ]);

        $result = DB::table('categorias')-> insert([            
            'nombre'     => $data['nombre'],
            'created_at' => Carbon::now()
        ]);

        if($result){
            return "La Categoria fue creada";
        }else{
            return "La categoria no pudo ser creado";
        }

    }


    /**
     * Actualiza una categoria específica en la base datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id id del post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $categoriasData = Categorias::find($id);
        $categoriasData->nombre = $request['nombre'] ? $request['nombre'] : $categoriasData->nombre;
        $categoriasData->updated_at    = Carbon::now();
        
        if($categoriasData->update()){
            return "La categoria se ha actualizado correctamente";
        }else{
            return "No se pudo actualizar la categoria";
        }

    }

    /**
     * Muestra los valores de una categoria específico
     *
     * @param  int  $id id del post
     * @return \Illuminate\Http\Response
     */
    public function ver($id)
    {
        $verCategorias = DB::select('SELECT * FROM categorias WHERE id = ?', [$id]);

        if($verCategorias){
            return $verCategorias;
        }else{
            return "No existe la categoria";
        }
    }

    /**
     * Muestra todos los registros de la tabla categorias
     *
     * @return \Illuminate\Http\Response
     */
    public function verTodo()
    {
        $verTodo = DB::select('SELECT * FROM categorias');

        if($verTodo){
            return $verTodo;
        }else{
            return "No hay registros";
        }
    }

    /**
     * Muestra los datos de una categoria específico a editar
     * se usa el mismo método ver() ya que cumple la misma función para mostrar los datos
     * @param  int  $id id de la categoria
     * @return \App\Http\Controllers\PostsController@ver
     */
    public function edit($id)
    {
       return $this->ver($id);
    }


     /**
     * Eliminar una categoria específica
     *
     * @param  int  $id id de la categoria
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $eliminarCategorias = Categorias::find($id);
        
        if($eliminarCategorias->delete()){
            return "La categoria ha sido eliminado";
        }else{
            return "La categoria no se pudo eliminar";
        }
    }
}
