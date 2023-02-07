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
                    
                    <div class="text-left" style="display: inline-block; margin: 0 auto; float:left;">
                        <h1>Hello {{auth()->user()->name}}</h1>   
                        {{ __('You are logged in!') }}
                    </div>
                    <div class="text-right" style="display: inline-block; margin: 0 auto; float:right;">
                        <h3><a href="{{ route('companyModalVer') }}">View All Companies(Via Modal)</a></h3> 
                        <h3><a href="{{ route('companyNextPageVer') }}">View All Companies(Via NextPage)</a></h3>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
