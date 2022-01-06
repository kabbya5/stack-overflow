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
                        <a href="" title="Tthis is question is useful" class="vote-up {{ Auth::guest() ? 'off': '' }}"
                        onclick="event.preventDefault(); document.getElementById('up-vote-{{ $question->id }}').submit();"> 
                            <i class="fas fa-caret-up fa-3x"></i>
                        </a>
                        <form id="up-vote-{{ $question->id }}" action="{{ route('question.vote',$question->id) }}" method="POST" style="display:none;">
                            @csrf
                            <input type="hidden" name="vote" value="1">
                        </form>
                        <span class="votes-count"> {{ $question->votes_count }} </span>

                        <a href="" title="This question is not useful" class="vote-down {{ Auth::guest() ? 'off' : '' }}"
                        onclick="event.preventDefault(); document.getElementById('down-vote-{{ $question->id }}').submit();"> 
                            <i class="fas fa-caret-down fa-3x"></i>
                        </a>
                        <form id="down-vote-{{ $question->id }}" action="{{ route('question.vote',$question->id) }}" method="POST" style="display:none;">
                            @csrf
                            <input type="hidden" name="vote" value="-1">
                        </form>
                        <a href="" title="Click to mark as favorite question (click again to undo)" 
                            class="favorite mt-2 {{ Auth::guest() ? 'off' : ($question->is_favorited ? 'favorited' :'') }} "
                            onclick="event.preventDefault(); document.getElementById('favorite-question-{{ $question->id }}').submit();"> 
                            <i class="fas fa-star fa-2x"></i> 
                            <span class="favorite-count"> {{ $question->favorites_count }} </span>
                        </a>
                        <form id="favorite-question-{{ $question->id }}" action="/questions/{{ $question->id }}/favorites" method="POST" style="display:none;">
                           
                            @if ($question->is_favorited)
                                @method('DELETE')
                            @endif
                            @csrf
                        </form>
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