@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-title">
                    <div class="d-flex justify-content-between p-2">
                        </h2> {{ $question->title }} </h2>
                        <div class="ml-auto">
                            <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Ask Question </a>
                        </div>
                    </div>
                </div>
                <div class="media d-flex">
                    @include('shared._vote',[
                        'model' => $question
                    ])
                    <div class="card-body">
                        {!! $question->body !!}
                        <div class="float-end">
                            <div class="media">
                                @include('shared._author',[
                                    'model' =>$question,
                                    'lable' =>'Ask'
                                ])  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('answers._index',[
        'answers' => $question->answers,
        'answers_count' => $question->answers_count,
    ])
    @include('answers._create')
   
</div>
@endsection