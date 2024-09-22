@extends('layouts.app')

@section('content')
<h1 class="mb-4">Add New Task</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Task Title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Enter task title">
    </div>
    <button type="submit" class="btn btn-primary">Add Task</button>
</form>
@endsection