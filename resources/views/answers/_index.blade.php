<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="meia">
                <div class="card-titel">
                    <h2>{{ $answers_count . " " . str_plural("Answer", $question->answers_count) }}</h2>
                </div>
               
                <hr>
                @include('layouts._message')
                @foreach ($answers as $answer)
                    <div class="media px-3 d-flex">
                        <div class="d-flex flex-column vote-controls">
                            <a href="" title="Tthis is question is useful" class="vote-up {{ Auth::guest() ? 'off': '' }}"
                                onclick="event.preventDefault(); document.getElementById('up-vote-{{ $answer->id }}').submit();"> 
                            <i class="fas fa-caret-up fa-3x"></i>
                        </a>
                        <form id="up-vote-{{ $answer->id }}" action="{{ route('answer.vote',$answer->id) }}" method="POST" style="display:none;">
                            @csrf
                            <input type="hidden" name="vote" value="1">
                        </form>
                        <span class="votes-count"> {{ $answer->votes_count }} </span>

                        <a href="" title="This question is not useful" class="vote-down {{ Auth::guest() ? 'off' : '' }}"
                        onclick="event.preventDefault(); document.getElementById('down-vote-{{ $answer->id }}').submit();"> 
                            <i class="fas fa-caret-down fa-3x"></i>
                        </a>
                        <form id="down-vote-{{ $answer->id }}" action="{{ route('answer.vote',$answer->id) }}" method="POST" style="display:none;">
                            @csrf
                            <input type="hidden" name="vote" value="-1">
                        </form>
                            
                        @can ('accept', $answer)
                            <a title="Mark this answer as best answer" 
                                class="{{ $answer->status }} mt-2"
                                onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer->id }}').submit();"
                                >
                                <i class="fas fa-check fa-2x"></i>                                    
                            </a>
                            <form id="accept-answer-{{ $answer->id }}" action="{{ route('answers.accept', $answer->id) }}" method="POST" style="display:none;">
                                @csrf
                            </form>
                        @else
                            @if ($answer->is_best)
                                <a title="The question owner accepted this answer as best answer" 
                                    class="{{ $answer->status }} mt-2"                                        
                                    >
                                    <i class="fas fa-check fa-2x"></i>                                    
                                </a>
                            @endif
                        @endcan       

                        </div> 
                        <div class="media-body mt-3">
                            <p class='float-start'>{!! $answer->body!!} </p>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mx-auto">
                                        <div class="d-flex">
                                            @can('update', $answer)
                                            <a href="{{ route('questions.answers.edit', [$question->id,$answer->id]) }}" class="btn btn-sm btn-outline-info"> Edit </a>
                                            @endcan
                                            @can('delete', $answer)
                                            <form action="{{ route('questions.answers.destroy',[$question->id,$answer->id]) }}" method="POST" class="form-delete">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return comfirm('Are You Sure')"> Delete </button>
                                            </form>
                                            @endcan
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-end">
                                <span color="text-muted"> Answered {{ $answer->created_date }}</span>
                                <div class="media">
                                    <a href="{{ $answer->user->url }}" class="pr-2">
                                        <img src="{{ $answer->user->avatar }}" alt="">
                                    
                                    </a>
                                    <div class="media-body">
                                        <a href="{{ $answer->user->url }}"> {{ $answer->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>