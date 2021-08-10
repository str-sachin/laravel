@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <div style="margin-left:250px;">{{ __('Admin Dashboard') }}</div>
            </div>

                <div class="card-body">
                    <div style="margin-left:250px;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {{ __('Welcome Admin') }}
                </div>
            </div>
            </div>
        </div>
    </div><br/><br/>
                <div>
                    <a href="role-register">
                    <p> User's Detail </p>
                    </a>
                </div>
</div>
@endsection
