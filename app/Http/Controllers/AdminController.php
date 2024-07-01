<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Facades\File;

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
                'name_img' => $product->name_img,
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
            'description.required' => 'La descripcion del producto es obligatorio.',
            'name_img.required' => 'La imagen del producto es obligatoria.',
            'name_img.image' => 'El archivo seleccionado no es una imagen.',
            'name_img.mimes' => 'El formato de la imagen no es valido, solo aceptamos (jpeg, png y jpg).',
            'name_img.max' => 'La imagen es demasiado grande maximo: 2Mb.',
        ];

        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'name_img' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ], $messages);

        try {

            $Product = new Products();

            $Product->name = $request->input('name');
            $Product->description = $request->input('description');
            $Product->price = $request->input('price');
            $Product->id_category = $request->input('id_category');

            $image = $request->file('name_img');
            $imageName = time().".".$image->extension();
            $image->move(public_path('img/products'), $imageName);

            $Product->name_img = $imageName;
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
            'description.required' => 'La descripcion del producto es obligatorio.',
            'name_img.image' => 'El archivo seleccionado no es una imagen.',
            'name_img.mimes' => 'El formato de la imagen no es valido, solo aceptamos (jpeg, png y jpg).',
            'name_img.max' => 'La imagen es demasiado grande maximo: 2Mb.',
        ];

        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'name_img' => 'image|mimes:jpeg,png,jpg|max:2048'
        ], $messages);


        $Product = Products::find($id);
        $Product->name = $request->input('name');
        $Product->description = $request->input('description');
        $Product->price = $request->input('price');

        try {
            if ($request->hasFile('name_img')) { //Valida si en el request se ha seleccciona una imagen

                $image = $request->file('name_img');
                $imageName = time().".".$image->extension();
                $oldImagePath = public_path('img/products/'.$Product->name_img);

                if(File::exists($oldImagePath)){
                    File::delete($oldImagePath);
                }

                $image->move(public_path('img/products'), $imageName);
                $Product->name_img = $imageName;
            }

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

            $ImagePath = public_path('img/products/'.$Product->name_img);

            if(File::exists($ImagePath)) {
                File::delete($ImagePath);
            }

            $Product->delete();
            return redirect()->back()->with('success', '¡Producto Eliminado!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Al intentar eliminar el producto');
        }
    }
}
