<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function add(){
        return view('admin.category.add');
    }

    public function insert(Request $request){
        $category = new Category();
        //funcion para guardar las imagenes dentro de una carpeta y los nombres dentro de la bd
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;

            //guardamos los datos de productos dentro de la bd
            $category->name = $request->input('name'); 
            $category->slug = $request->input('slug'); 
            $category->description = $request->input('description'); 
            $category->status = $request->input('status')== TRUE? '1':'0'; 
            $category->popular = $request->input('popular')== TRUE? '1':'0'; 
            $category->meta_title = $request->input('meta_title'); 
            $category->meta_keywords = $request->input('meta_keywords'); 
            $category->meta_descrip = $request->input('meta_description'); 
            $category->save();
            return redirect('/categories')->with('estado',"Categoria agregada con exito");
        }

    }

    public function edit($id){
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){

        $category = Category::find($id);

        if($request->hasFile('image')){
            $path = 'assets/uploads/category/'. $category->image;
            if(File::exists($path)){

                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name'); 
        $category->slug = $request->input('slug'); 
        $category->description = $request->input('description'); 
        $category->status = $request->input('status')== TRUE? '1':'0'; 
        $category->popular = $request->input('popular')== TRUE? '1':'0'; 
        $category->meta_title = $request->input('meta_title'); 
        $category->meta_keywords = $request->input('meta_keywords'); 
        $category->meta_descrip = $request->input('meta_description'); 
        $category->update();
        return redirect('/categories')->with('estado',"Categoria actualizada con exito");

    }

    public function destroy($id){

        $category = Category::find($id);
        if($category->image){

            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('/categories')->with('estado',"Categoria fue borrada con exito");
    }
}