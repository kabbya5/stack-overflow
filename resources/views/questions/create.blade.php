@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex aling-items-enter">
                        </h2> Ask Questions </h2>
                        <div class="ml-auto">
                            <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">All Questions </a>
                        </div>
                    </div>

                <div class="card-body">                    
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf
                        @include('questions._form',["buttonText" => "Ask Question "])
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection