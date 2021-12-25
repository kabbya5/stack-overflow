@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex aling-items-enter">
                        </h2> {{ $question->title }} </h2>
                        <div class="ml-auto">
                            <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Ask Question </a>
                        </div>
                    </div>

                <div class="card-body">
                  {!! $question->body !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection