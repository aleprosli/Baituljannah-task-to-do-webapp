@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Audit Log') }}</div>

                <div class="card-body">
                    {{ $all ?? null}}
                    {{-- <p>{{ $all->user_id }}</p> --}}
                    {{-- <p>{{ $all->event }}</p> --}}
                    {{-- <p>{{ $all->old_values }}</p> --}}
                    {{-- <p>{{ $all->new_values }}</p> --}}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
