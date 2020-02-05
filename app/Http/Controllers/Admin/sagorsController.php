<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\sagor;
use Illuminate\Http\Request;

class sagorsController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $sagors = sagor::where('string', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sagors = sagor::latest()->paginate($perPage);
        }

        return view('admin.sagors.index', compact('sagors'));
    }


    public function create()
    {
        return view('admin.sagors.create');
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        sagor::create($requestData);

        return redirect('admin/sagors')->with('flash_message', 'sagor added!');
    }


    public function show($id)
    {
        $sagor = sagor::findOrFail($id);

        return view('admin.sagors.show', compact('sagor'));
    }

    public function edit($id)
    {
        $sagor = sagor::findOrFail($id);

        return view('admin.sagors.edit', compact('sagor'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $sagor = sagor::findOrFail($id);
        $sagor->update($requestData);

        return redirect('admin/sagors')->with('flash_message', 'sagor updated!');
    }


    public function destroy($id)
    {
        sagor::destroy($id);

        return redirect('admin/sagors')->with('flash_message', 'sagor deleted!');
    }
}
