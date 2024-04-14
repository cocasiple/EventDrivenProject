<?php
namespace App\Http\Controllers;


use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Payroll;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::all();
        $employees = Employee::all();
    
        return view('payroll', [
            'payrolls' => $payrolls,
            'employees' => $employees,
        ]);
    }
    
    public function create()
    {
        $employees = Employee::all();
    
        return view('payrolls', [
            'employees' => $employees,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employees_id' => 'required|integer',
            'start_of_cutoff' => 'required|date',
            'end_of_cutoff' => 'required|date',
            'total_pay' => 'required|numeric',
        ]);

        Payroll::create($validatedData);

        return redirect()->route('payroll.index')->with('success', 'Payroll created successfully.');
    }

    public function destroy(Payroll $payroll)
    {
        $payroll->delete();

        return redirect()->route('payroll.index')->with('success', 'Payroll deleted successfully.');
    }
}
