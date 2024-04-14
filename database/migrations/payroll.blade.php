@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Payroll Management</h1>

    <!-- Button to open the modal for creating a new payroll -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createPayrollModal">
        Add Payroll
    </button>

    <!-- Modal for creating a new payroll -->
    <div class="modal fade" id="createPayrollModal" tabindex="-1" role="dialog" aria-labelledby="createPayrollModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPayrollModalLabel">Add Payroll</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for creating a new payroll -->
                    <form action="{{ route('payroll.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="employees_id">Employee:</label>
                            <select name="employees_id" id="employees_id" class="form-control" required>
                                <option value="" disabled selected>Select Employee</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->firstname }} {{ $employee->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_of_cutoff">Start of Cutoff:</label>
                            <input type="date" name="start_of_cutoff" id="start_of_cutoff" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_of_cutoff">End of Cutoff:</label>
                            <input type="date" name="end_of_cutoff" id="end_of_cutoff" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="total_pay">Total Pay:</label>
                            <input type="number" name="total_pay" id="total_pay" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Payroll</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Table for displaying payroll records -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Start of Cutoff</th>
                <th>End of Cutoff</th>
                <th>Total Pay</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $payroll)
                <tr>
                    <td>{{ $payroll->id }}</td>
                    <td>{{ $payroll->employee->firstname }} {{ $payroll->employee->lastname }}</td>
                    <td>{{ date('Y-m-d', strtotime($payroll->start_of_cutoff)) }}</td>
<td>{{ date('Y-m-d', strtotime($payroll->end_of_cutoff)) }}</td>

                    <td>{{ number_format($payroll->total_pay, 2) }}</td>
                    <td>
                        <!-- Form to delete payroll entry -->
                        <form action="{{ route('payroll.destroy', $payroll->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
