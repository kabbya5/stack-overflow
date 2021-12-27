@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        </h2> ALL Questions </h2>
                        <div class="ml-auto">
                            <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Ask Question </a>
                        </div>
                    </div>

                <div class="card-body">
                    @include('layouts._message')
                    @foreach ($questions as $question)
                    <div class="media d-flex">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong>{{$question->votes_count}}</strong> {{str_plural('vote',$question->votes)}}
                            </div>
                            <div class="status {{$question->status}}">
                                <strong>{{$question->answers}}</strong> {{str_plural('answer',$question->answers)}}
                            </div>
                            <div class="view">
                                {{$question->views . " " .str_plural('view',$question->views)}}
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="d-flex justify-content-between">
                                <h3 class="mt-0 "> <a href="{{$question->url}}">{{$question->title}}</a> </h3>

                                <div class="d-flex">
                                    <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info"> Edit </a>
                                    <form action="{{ route('questions.destroy',$question->id) }}" method="POST" class="form-delete">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return comfirm('Are You Sure')"> Delete </button>
                                    </form>
                                </div>
                            </div>
            
                            <p class="lead">
                                Asked by 
                                <a href="{{$question->user->url }}"> {{$question->user->name}} </a>
                                <small class="text-muted"> {{$question->created_date}}  </small>
                                
                            </p>
                            {{str_limit($question->body, 250)}}
                        </div>
                    </div>
                    @endforeach

                  {{$questions->links('layouts.paginationlink')}}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection