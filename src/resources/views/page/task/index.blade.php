@extends('layouts.app')
@section('content')
    
    <div class="d-flex bd-highlight mb-b">
        <div class="p-2 bd-highlight"><h5 class="m-0">List of Task</h5></div>
        <div class="ms-auto p-2 bd-highlight">
            <a href="{{ route('task.create') }}" class="btn btn-sm btn-primary">New</a>
        </div>
    </div>

    <table class="table table-striped border">
        <thead>
            <tr>
                <th>Id</th>
                <th>Task</th>
                <th>Description</th>
                <th>Assigned to</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
            </tr>
        </tbody>
    </table>
@endsection
