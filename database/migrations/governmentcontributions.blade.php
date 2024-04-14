@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Government Contributions Management</h1>

    <!-- Button to open the modal for creating a new government contribution -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createContributionModal">
        Add Contribution
    </button>

    <!-- Modal for creating a new government contribution -->
    <div class="modal fade" id="createContributionModal" tabindex="-1" role="dialog" aria-labelledby="createContributionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createContributionModalLabel">Add Contribution</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for creating a new government contribution -->
                    <form action="{{ route('government_contributions.store') }}" method="POST">
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
                            <label for="sss_contribution">SSS Contribution:</label>
                            <input type="number" name="sss_contribution" id="sss_contribution" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="pagibig_contribution">Pag-ibig Contribution:</label>
                            <input type="number" name="pagibig_contribution" id="pagibig_contribution" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="philhealth_contribution">Philhealth Contribution:</label>
                            <input type="number" name="philhealth_contribution" id="philhealth_contribution" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tin_number">TIN Number:</label>
                            <input type="number" name="tin_number" id="tin_number" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Contribution</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Table for displaying government contributions -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>SSS Contribution</th>
                <th>Pag-ibig Contribution</th>
                <th>Philhealth Contribution</th>
                <th>TIN Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($governmentContributions as $contribution)
                <tr>
                    <td>{{ $contribution->id }}</td>
                    <td>{{ $contribution->employee->firstname }} {{ $contribution->employee->lastname }}</td>
                    <td>{{ number_format($contribution->sss_contribution, 2) }}</td>
                    <td>{{ number_format($contribution->pagibig_contribution, 2) }}</td>
                    <td>{{ number_format($contribution->philhealth_contribution, 2) }}</td>
                    <td>{{ $contribution->tin_number }}</td>
                    <td>
                        <!-- Form to delete government contribution -->
                        <form action="{{ route('government_contributions.destroy', $contribution->id) }}" method="POST">
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
