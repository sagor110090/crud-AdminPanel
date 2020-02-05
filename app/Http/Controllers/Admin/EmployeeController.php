<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $employee = Employee::where('Name', 'LIKE', "%$keyword%")
                ->orWhere('age', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $employee = Employee::latest()->paginate($perPage);
        }

        return view('admin.employee.index', compact('employee'));
    }


    public function create()
    {
        return view('admin.employee.create');
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Employee::create($requestData);

        return redirect('admin/employee')->with('flash_message', 'Employee added!');
    }


    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('admin.employee.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        return view('admin.employee.edit', compact('employee'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $employee = Employee::findOrFail($id);
        $employee->update($requestData);

        return redirect('admin/employee')->with('flash_message', 'Employee updated!');
    }


    public function destroy($id)
    {
        Employee::destroy($id);

        return redirect('admin/employee')->with('flash_message', 'Employee deleted!');
    }
}
