<?php

namespace App\Http\Controllers;

use App\Models\GovernmentContributions;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GovernmentContributionsController extends Controller
{
    public function index()
    {
        // Get all government contributions and employees
        $governmentContributions = GovernmentContributions::all();
        $employees = Employee::all();

        // Return the view with the data
        return view('governmentcontributions', [
            'governmentContributions' => $governmentContributions,
            'employees' => $employees,
        ]);
    }

    public function create()
    {
        // Get all employees for the create form
        $employees = Employee::all();
        
        // Return the create view
        return view('governmentcontributions', [
            'employees' => $employees,
        ]);
    }

    public function store(Request $request)
    {
 
        // Validate the request data
        $validatedData = $request->validate([
            'employees_id' => 'required',
            'sss_contribution' => 'required',
            'pagibig_contribution' => 'required',
            'philhealth_contribution' => 'required',
            'tin_number' => 'required',
        ]);

        // Create a new government contribution record
        GovernmentContributions::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('government_contributions.index')->with('success', 'Government contribution added successfully.');
    }

    public function destroy(GovernmentContributions $governmentContribution)
    {
        // Delete the specified government contribution record
        $governmentContribution->delete();

        // Redirect to the index page with a success message
        return redirect()->route('government_contributions.index')
                         ->with('success', 'Government contribution deleted successfully.');
    }
}
