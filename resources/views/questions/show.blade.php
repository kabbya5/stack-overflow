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
                    <div class="d-flex flex-column vote-controls">
                        <a href="" title="Tthis is question is useful" class="vote-up">
                            vote up
                        </a>
                        <span class="votes-count"> 23 </span>
                        <a href="" title="This question is not useful" class="vote-down off"> vote down </a>
                        <a href="" title="Click to mark as favorite question (click again to undo)" class="favorite"> favorite <span class="favorite-count"> 34 </span></a>
                    </div>
                    <div class="card-body">
                        {!! $question->body !!}
                        <div class="float-end">
                            <span color="text-muted"> Answered {{ $question->created_date }}</span>
                            <div class="media">
                                <a href="{{ $question->user->url }}" class="pr-2">
                                    <img src="{{ $question->user->avatar }}" alt="">
                                
                                </a>
                                <div class="media-body">
                                    <a href="{{ $question->user->url }}"> {{ $question->user->name }}</a>
                                </div>
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