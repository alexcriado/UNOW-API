<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categorias = Categorias::all();
            return response()->json($categorias);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al obtener las categorías de productos.'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categoria = Categorias::create($request->all());
            return response()->json($categoria, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al guardar la categoría de producto.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $categoria = Categorias::findOrFail($id);
            return response()->json($categoria);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Categoría de producto no encontrada.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al obtener la categoría de producto.'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $categoria = Categorias::findOrFail($id);
            $categoria->update($request->all());
            return response()->json($categoria, 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Categoría de producto no encontrada.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al actualizar la categoría de producto.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $categoria = Categorias::findOrFail($id);
            $categoria->delete();
            return response()->json(["success" => "Categoria borrada correctamente."], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Categoría de producto no encontrada.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al eliminar la categoría de producto.'], 500);
        }
    }
}
