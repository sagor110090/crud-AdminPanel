<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\test;
use Illuminate\Http\Request;

class testController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $test = test::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('age', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $test = test::latest()->paginate($perPage);
        }

        return view('admin.test.index', compact('test'));
    }


    public function create()
    {
        return view('admin.test.create');
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }

        test::create($requestData);

        return redirect('admin/test')->with('flash_message', 'test added!');
    }


    public function show($id)
    {
        $test = test::findOrFail($id);

        return view('admin.test.show', compact('test'));
    }

    public function edit($id)
    {
        $test = test::findOrFail($id);

        return view('admin.test.edit', compact('test'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }

        $test = test::findOrFail($id);
        $test->update($requestData);

        return redirect('admin/test')->with('flash_message', 'test updated!');
    }


    public function destroy($id)
    {
        test::destroy($id);

        return redirect('admin/test')->with('flash_message', 'test deleted!');
    }
}
