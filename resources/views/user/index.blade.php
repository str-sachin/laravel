@extends('layouts.app')

@section('content')
@if (Auth::user() && Auth::user()->role == '2')
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

                    {{ __('You are logged in! User') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
