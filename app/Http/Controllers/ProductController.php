<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::all(); // O puedes usar paginate()
        return view('products.index', compact('productos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
        ]);

        // Guardamos el producto
        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ]);

        // Redireccionamos con mensaje
        return redirect()->route('products.index')->with('success', 'Producto guardado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id); // o inyecta el modelo directamente si lo prefieres
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0', // Este será el stock a sumar
        ]);

        // Buscar el producto
        $product = Product::findOrFail($id);

        // Actualizar campos normales
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];

        $product->stock = $validated['stock'];

      
        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Product::findOrFail($id); // Busca el producto o lanza 404 si no existe
        $producto->delete();

        return redirect()->route('products.index') // Redirige al listado
            ->with('success', 'Producto eliminado correctamente.');
    }
}
