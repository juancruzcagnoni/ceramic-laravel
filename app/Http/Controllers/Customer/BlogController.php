<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\User;

class BlogController extends Controller
{
    public function index() {
        return view('blog-page', ['blog' => Post::all()]);
    }
    
    public function show($id) {
        $post = Post::find($id);
        return view('detail-post', ['post' => $post]);
    }
    
    public function create() {
        return view('abm-blog');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|min:2|max:100',
            'subtitle'    => 'required|min:2|max:100',
            'description' => 'required|min:10|max:100',
            'text'        => 'required|min:20|max:1000',
            'image'       => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect('/abm-blog')
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public', $imageName);
        $imageUrl = asset('storage/' . $imageName);

        $user = auth()->user();
        $user->posts()->create([
            'title'       => $request->input('title'),
            'subtitle'    => $request->input('subtitle'),
            'desc'        => $request->input('description'),
            'text'        => $request->input('text'),
            'image'       => $imageUrl,
            'ip_address'  => $request->ip(),
        ]);

        return redirect('/abm-blog')->with('success', 'Post creado exitosamente');
    }
    
}
