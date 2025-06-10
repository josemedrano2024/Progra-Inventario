<?php

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController
{
    public function update(Request $request, $id)
    {
        // Validar campos del formulario
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => 'nullable|image|max:2048', // Imagen opcional
        ]);

        // Buscar producto por ID
        $product = Product::findOrFail($id);

        // Actualizar atributos
        $product->code = $request->code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category = $request->category;
        $product->supplier = $request->supplier;
        $product->date = $request->date;

        // Manejar nueva imagen si se sube
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // Guardar la nueva imagen
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        // Guardar cambios
        $product->save();

        // Redireccionar con mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }
}