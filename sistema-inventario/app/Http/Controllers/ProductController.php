<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:products|max:50',
            'name' => 'required|max:100',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category' => 'required|max:50',
            'supplier' => 'nullable|max:100',
            'expiration_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $validated['user_id'] = Auth::id();
        
        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

   public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'code' => 'required|max:50|unique:products,code,'.$product->id,
        'name' => 'required|max:100',
        'description' => 'nullable',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'category' => 'required|max:50',
        'supplier' => 'nullable|max:100',
        'expiration_date' => 'nullable|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Manejo de la imagen
    if ($request->hasFile('image')) {
        // Eliminar imagen anterior si existe
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $validated['image'] = $request->file('image')->store('products', 'public');
    }

    // Actualizar el producto
    $product->update($validated);

    return redirect()->route('products.index')
        ->with('success', 'Producto actualizado exitosamente.');
}

    public function destroy(Product $product)
    {
        // Eliminar imagen si existe
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();

        return redirect()->route('products.index')
        ->with('success', 'Producto actualizado correctamente');
       
    }
}