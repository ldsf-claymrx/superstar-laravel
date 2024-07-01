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
        $products = Products::select('products.id', 'products.name', 'products.description', 'products.price', 'products.name_img', 'categories.name as category_name', 'products.id_category', 'users.name as who_registered')->
        join('categories', 'products.id_category', '=', 'categories.id')->
        leftJoin('users', 'products.who_registered', '=', 'users.id')->get();

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
            'id_category.required' => 'La categoría es obligatoria.',
        ];

        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'name_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'id_category' => 'required'
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

        try {

            $Product = Products::find($id);
            $Product->name = $request->input('name');
            $Product->description = $request->input('description');
            $Product->price = $request->input('price');

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

    public function getCategories() {

        $categories = Categories::select('categories.id', 'categories.name', 'users.name as who_registered')->
        join('users', 'categories.who_registered', '=', 'users.id')->get();


        return view('admin.categories', [
            'categories' => $categories
        ]);
    }

    public function createCategory(Request $request) {
        $messages = [
            'name.required' => 'El nombre de la categoría es obligatoria.'
        ];

        $validatedData = $request->validate([
            'name' => 'required|string'
        ], $messages);

        try {
            $Category = new Categories();
            $Category->name = $request->input('name');
            $Category->who_registered = $request->input('who_registered');
            $Category->save();

            return redirect()->back()->with('success', '¡Categoría Registrada!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Al intentar registrar la categoría');
        }
    }

    public function updateCategory(Request $request, $id) {
        $messages = [ 'name.required' => 'El nombre de la categoría es obligatoria.'];
        $validatedData = $request->validate(['name' => 'required|string'], $messages);

        try {

            $Category = Categories::find($id);
            $Category->name = $request->input('name');
            $Category->update();
            return redirect()->back()->with('success', '¡Categoría Actualizada!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Al intentar actualizar la categoría');
        }
    }

    public function deleteCategory($id) {
        try {
            $Category = Categories::find($id);
            $Category->delete();
            return redirect()->back()->with('success', '¡Categoría Eliminada!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Al intentar eliminar la categoría');
        }
    }
}
