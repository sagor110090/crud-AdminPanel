<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\post;
use Illuminate\Http\Request;

class postsController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $posts = post::where('string', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $posts = post::latest()->paginate($perPage);
        }

        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.posts.create');
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        post::create($requestData);

        return redirect('admin/posts')->with('flash_message', 'post added!');
    }


    public function show($id)
    {
        $post = post::findOrFail($id);

        return view('admin.posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $post = post::findOrFail($id);
        $post->update($requestData);

        return redirect('admin/posts')->with('flash_message', 'post updated!');
    }


    public function destroy($id)
    {
        post::destroy($id);

        return redirect('admin/posts')->with('flash_message', 'post deleted!');
    }
}
