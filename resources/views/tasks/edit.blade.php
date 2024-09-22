@extends('layouts.app')

@section('content')
<h1 class="mb-4">Edit Task</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Task Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Task</button>
</form>
@endsection