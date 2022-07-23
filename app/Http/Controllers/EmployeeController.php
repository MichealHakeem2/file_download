<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $emps = Employee::all();
        return view("employee.index")->with("emps",$emps);
    }
    public function create()
    {
        return view("employee.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            'empName' =>"required|string|min:3|max:20|unique:employees,name,",
            'empSalary' =>"required|numeric"
        ]);
        $employee = new Employee();
        $employee->name = $request->empName;
        $employee->salary = $request->empSalary;
        $employee->save();
        return redirect("/emps")->with("done","Add Employee Done");
    }
    public function show(Employee $employee)
    {
        //
    }

    public function edit($id)
    {
        $emp = Employee::find($id);
        return view("employee.edit")->with("emp",$emp);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'empName' =>"required|string|min:3|max:20",
            'empSalary' =>"required|numeric"
        ]);
        $employee = Employee::find($id);
        $employee->name = $request->empName;
        $employee->salary = $request->empSalary;
        $employee->save();
        return redirect("/emps")->with("done","Update Employee Done");
    }

    public function destroy($id)
    {
        $emp = Employee::find($id);
        $emp->delete();
        return redirect('/emps')->with("delete","Delete Employee Done");
    }
}
