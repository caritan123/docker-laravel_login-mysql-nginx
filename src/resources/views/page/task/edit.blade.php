@extends('layouts.app')
@section('content')
    <div class="d-flex bd-highlight mb-5">
        <div class="bd-highlight">
            <h6 class="m-0"><a href="{{ route('task.index') }}" class="me-2">Back</a>Update Task</h6>
        </div>
        
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Task Name</label>
        <input type="text" class="form-control" placeholder="Enter task name">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Assigned to</label>
        <input type="text" class="form-control" readonly>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Re-assign to</label>
        <select name="" id="" class="form-control">
            <option value="">Select</option>
            <option value="">John Doe</option>
            <option value="">Jane Doe</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Enter Description"></textarea>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Status</label>

        {{-- if value of task->status is equal to 0 then start the loop from 1 --}}
        <select name="" id="" class="form-control">
            <option value="0">Pending</option>
            <option value="1">Received</option>
            <option value="2">Done</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary w-100">Submit</button>
@endsection
