<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class AdminController extends Controller
{
    public function getViewDashboard() {
        return view('admin.dashboard');
    }

    public function getProducts() {
        $categories = Categories::all();

        $products = Products::with(['category', 'registeredBy'])->get();

        $products = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'category_name' => $product->category ? $product->category->name : null,
                'id_category' => $product->category,
                'registered_by' => $product->registeredBy ? $product->registeredBy->name : null,
            ];
        });

        return view('admin.products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function createProduct(Request $request){
        $messages = [
            'name.required' => 'El nombre del producto es obligatorio.',
            'price.required' => 'El precio del producto es obligatorio.',
            'description.required' => 'La descripcion del producto es obligatorio.'
        ];

        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string'
        ], $messages);

        try {
            $Product = new Products();

            $Product->name = $request->input('name');
            $Product->description = $request->input('description');
            $Product->price = $request->input('price');
            $Product->id_category = $request->input('id_category');
            $Product->who_registered = $request->input('who_registered');
            $Product->save();

            return redirect()->back()->with('success', '¡Producto Registrado!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Al intentar registrar el producto');
        }
    }

    public function updateProduct(Request $request, $id) {
        $messages = [
            'name.required' => 'El nombre del producto es obligatorio.',
            'price.required' => 'El precio del producto es obligatorio.',
            'description.required' => 'La descripcion del producto es obligatorio.'
        ];

        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string'
        ], $messages);

        try {
            $Product = Products::find($id);
            $Product->name = $request->input('name');
            $Product->description = $request->input('description');
            $Product->price = $request->input('price');
            $Product->id_category = $request->input('id_category');
            $Product->update();
            return redirect()->back()->with('success', '¡Producto Actualizado!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Al intentar actualizar el producto');
        }
    }

    public function deleteProduct($id) {
        try {
            $Product = Products::find($id);
            $Product->delete();
            return redirect()->back()->with('success', '¡Producto Eliminado!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Al intentar eliminar el producto');
        }
    }
}
