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
                        @include('shared._vote',[
                            'model' => $answer
                        ])
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
                                <div class="media">
                                    @include('shared._author',[
                                        'model' =>$answer,
                                        'lable' =>'answered'
                                    ])  
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>