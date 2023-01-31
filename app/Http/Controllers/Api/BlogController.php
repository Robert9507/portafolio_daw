<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Blog::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Título'=>'required|string|max:50',
            'Contenido'=>'required|string|max:90',
            'Fecha de publicación'=>'required|string|max:30',
            'Autor'=>'required|max:30',
            'Categoria'=>'required|string|max:20',
            'Número de vistas'=>'required|string|max:15',
            'Imagen destacada'=>'required|max:2000 ',
            'Etiquetas'=>'required|string |max:15', 
        ]);

        return Blog::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Blog::find($id);
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
        $request->validate([
            'Título'=>'required|string|max:50',
            'Contenido'=>'required|string|max:90',
            'Fecha de publicación'=>'required|string|max:30',
            'Autor'=>'required|max:30',
            'Categoria'=>'required|string|max:20',
            'Número de vistas'=>'required|string|max:15',
            'Imagen destacada'=>'required|max:2000 ',
            'Etiquetas'=>'required|string |max:15',
        ]);

        $blog = Blog::find($id);
        
        $blog->update([
            'Título'=>request('Título'),
            'Contenido'=>request('Contenido'),
            'Fecha de publicación'=>request('Fecha de publicación'),
            'Autor'=>request('Autor'),
            'Categoria'=>request('Categoria'),
            'Número de vistas'=>request('Número de vistas'),
            'Imagen destacada'=>request('Imagen destacada'),
            'Etiquetas'=>request('Etiquetas')
        ]);

        return $blog;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog ->delete();
        return response()->json([
            'response'=>'El Blog fue eliminado'
        ]);
    }
}
