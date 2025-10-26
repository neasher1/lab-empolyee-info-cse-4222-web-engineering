<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Show all employees with pagination
    public function index()
    {
        // Get employees with pagination
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    // Show the form to create a new employee
    public function create()
    {
        return view('employees.create');
    }

    // Store a new employee in the database
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:100',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric|min:0',
            'email' => 'nullable|email|max:255',
            'mobile_no' => 'required|string|max:15',
            'address' => 'required|string',
        ]);

        // Create the employee
        Employee::create($request->all());

        // Redirect to home with success message
        return redirect()->route('home')->with('success', 'Employee added successfully.');
    }

    // Show the form to edit an existing employee
    public function edit($id)
    {
        // Find the employee by ID
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    // Update an existing employee in the database
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:100',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric|min:0',
            'email' => 'nullable|email|max:255',
            'mobile_no' => 'required|string|max:15',
            'address' => 'required|string',
        ]);

        // Find the employee by ID
        $employee = Employee::findOrFail($id);

        // Update the employee's information
        $employee->update($request->all());

        // Redirect to home with success message
        return redirect()->route('home')->with('success', 'Employee updated successfully.');
    }

    // Delete an employee from the database
    public function destroy($id)
    {
        // Find the employee by ID and delete it
        $employee = Employee::findOrFail($id);
        $employee->delete();

        // Redirect to home with success message
        return redirect()->route('home')->with('success', 'Employee deleted successfully.');
    }

    // Search for employees based on name or designation
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search in the name and designation columns
        $employees = Employee::where('name', 'like', "%{$query}%")
            ->orWhere('designation', 'like', "%{$query}%")
            ->paginate(10);

        return view('employees.index', compact('employees'));
    }
}