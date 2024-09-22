@extends('layouts.app')

@section('content')
<h1 class="mb-4">Todo List</h1>

<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Add New Task</a>

@if ($message = Session::get('success'))
<div class="alert alert-success">{{ $message }}</div>
@endif

@if ($tasks->count())
<ul class="list-group">
    @foreach ($tasks as $task)
    <li class="list-group-item d-flex justify-content-between align-items-center {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
        {{ $task->title }}
        <div>
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>

            <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-sm {{ $task->is_completed ? 'btn-success' : 'btn-secondary' }}">
                    {{ $task->is_completed ? 'Mark as Incomplete' : 'Mark as Complete' }}
                </button>
            </form>

            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    </li>
    @endforeach
</ul>
@else
<p>No tasks yet.</p>
@endif
@endsection