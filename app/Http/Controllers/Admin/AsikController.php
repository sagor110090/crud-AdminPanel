<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Asik;
use Illuminate\Http\Request;

class AsikController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $asik = Asik::where('string', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $asik = Asik::latest()->paginate($perPage);
        }

        return view('admin.asik.index', compact('asik'));
    }


    public function create()
    {
        return view('admin.asik.create');
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Asik::create($requestData);

        return redirect('admin/asik')->with('flash_message', 'Asik added!');
    }


    public function show($id)
    {
        $asik = Asik::findOrFail($id);

        return view('admin.asik.show', compact('asik'));
    }

    public function edit($id)
    {
        $asik = Asik::findOrFail($id);

        return view('admin.asik.edit', compact('asik'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $asik = Asik::findOrFail($id);
        $asik->update($requestData);

        return redirect('admin/asik')->with('flash_message', 'Asik updated!');
    }


    public function destroy($id)
    {
        Asik::destroy($id);

        return redirect('admin/asik')->with('flash_message', 'Asik deleted!');
    }
}
