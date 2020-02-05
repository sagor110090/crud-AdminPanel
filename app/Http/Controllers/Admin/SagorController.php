<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sagor;
use Illuminate\Http\Request;

class SagorController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $sagor = Sagor::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sagor = Sagor::latest()->paginate($perPage);
        }

        return view('admin.sagor.index', compact('sagor'));
    }


    public function create()
    {
        return view('admin.sagor.create');
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Sagor::create($requestData);

        return redirect('admin/sagor')->with('flash_message', 'Sagor added!');
    }


    public function show($id)
    {
        $sagor = Sagor::findOrFail($id);

        return view('admin.sagor.show', compact('sagor'));
    }

    public function edit($id)
    {
        $sagor = Sagor::findOrFail($id);

        return view('admin.sagor.edit', compact('sagor'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $sagor = Sagor::findOrFail($id);
        $sagor->update($requestData);

        return redirect('admin/sagor')->with('flash_message', 'Sagor updated!');
    }


    public function destroy($id)
    {
        Sagor::destroy($id);

        return redirect('admin/sagor')->with('flash_message', 'Sagor deleted!');
    }
}
