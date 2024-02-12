<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $productos = Productos::all();
            return response()->json($productos);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al obtener los productos.'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $producto = Productos::create($request->all());
            return response()->json($producto, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al guardar el producto.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $producto = Productos::findOrFail($id);
            return response()->json($producto);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Producto no encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al obtener el producto.'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $producto = Productos::findOrFail($id);
            $producto->update($request->all());
            return response()->json($producto, 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Producto no encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al actualizar el producto.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $producto = Productos::findOrFail($id);
            $producto->delete();
            return response()->json(["success" => "Producto borrado."], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Producto no encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hubo un error al eliminar el producto.'], 500);
        }
    }
}
