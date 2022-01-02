@extends('layouts.app')
    
@section('content')
    

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card-body">
            <h1> Editing answer for question <strong>{{ $question->title }}</strong></h1>
            <hr>
            <form action="{{ route('questions.answers.update',[$question->id,$answer->id]) }}" method="POST">
            @csrf 
            @method('PUT')
                <div class="form-group">
                    <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">
                       {!! $answer->body !!}
                    </textarea>
                    @error('body')
                    <span class="alert alert-danger">
                        {{ $message }}
                    </span>
                    @enderror

                    <button type="submit" class="btn btn-primary"> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
