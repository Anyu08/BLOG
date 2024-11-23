<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
   

public function store(Request $request)
{
    
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',  // Cambiado a nullable
        ]);
        
    

    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    

    // Si hay una imagen, almacenarla y obtener la ruta
    if ($request->hasFile('image')) {
        $post->image = $request->file('image')->store('public/images'); // Guarda en storage/app/public/images
        $imagePath = $request->file('image')->store('images', 'public');

    }


    $post->save();

    return redirect()->route('blog.index')->with('success', 'Publicación creada con éxito');
}
}