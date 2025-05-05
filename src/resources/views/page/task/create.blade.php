@extends('layouts.app')
@section('content')
    <div class="d-flex bd-highlight mb-5">
        <div class="bd-highlight">
            <h6 class="m-0"><a href="{{ route('task.index') }}" class="me-2">Back</a>Create Task</h6>
        </div>
    </div>

    <form action="{{ route('task.store') }}" method="post">
        @csrf
        <div class="mb-3  @error('name') text-danger @enderror">
            <label for="" class="form-label">Task Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter task name"
                name="name">

            @error('name')
                <label for="" class="py-2">{{ $message }}</label>
            @enderror
        </div>

        <div class="mb-3 @error('name') text-danger @enderror"">
            <label for="" class="form-label">Assigned to</label>
            <select name="assigned_to" id="" class="form-control @error('assigned_to') is-invalid @enderror">
                <option value="">Select</option>

                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            @error('assiged_to')
                <label for="" class="py-2">{{ $message }}</label>
            @enderror
        </div>

        <div class="mb-3 @error('name') text-danger @enderror"">
            <label for="" class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control  @error('description') is-invalid @enderror"
                placeholder="Enter Description"></textarea>

            @error('description')
                <label for="" class="py-2">{{ $message }}</label>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
@endsection
