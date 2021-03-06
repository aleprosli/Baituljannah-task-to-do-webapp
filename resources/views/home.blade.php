@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card-header">{{ __('Task') }}</div>

                <div class="card-body">
                    <a href="{{ route('todolist:index') }}" class="btn btn-secondary">View Task</a>
                </div>
            </div>

            <br>
            
            <div class="card">
                <div class="card-header">{{ __('Audit Log') }}</div>

                <div class="card-body">
                    <a href="{{ route('audit:index') }}" class="btn btn-secondary">View Log</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
