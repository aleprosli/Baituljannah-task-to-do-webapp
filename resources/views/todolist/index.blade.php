@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3>To-do List</h3>
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(auth()->user()->is_premium == 1 || (auth()->user()->is_premium == 0 && auth()->user()->todolists->count() < 5))
                            <div class="input-group">
                                <a href="{{ route('todolist:create') }}" type="button" class="btn btn-info">Add task</a>
                            </div>
                            @else
                            <p> Your free account has reached limit </p>
                            <div class="input-group">
                                <a href="{{ route('upgrade:index') }}" type="button" class="btn btn-info">Please upgrade account</a>
                            </div>
                            @endif

                            @if (count($todolists))
                                <ul class="list-group list-group-flush mt-3">
                                    <li class="list-group-item">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Number</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Reminder</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($todolists as $key=>$todolist)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $todolist->title ?? null }}</td>
                                                    <td>{{ $todolist->description ?? null }}</td>
                                                    <td>{{ $todolist->date ?? null }}</td>
                                                    <td><a onclick="return confirm('Are you sure to set reminder?')" href="{{ route('todolist:reminder',$todolist) }}" class="btn btn-danger">Reminder</a>
                                                    </td>
                                                    <td>
                                                    <a href="{{ route('todolist:edit',$todolist) }}" class="btn btn-warning">Edit</a>
                                                    <a onclick="return confirm('Are you sure?')" href="{{ route('todolist:delete',$todolist) }}" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </li>
                                </ul>
                            @else
                            <p class="text-center mt-3">No Tasks!</p>
                            @endif
                        
                    </div>
                    <div class="card-footer">
                        You have {{ count($todolists) }} pending tasks
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
