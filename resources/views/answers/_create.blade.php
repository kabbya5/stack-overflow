<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="meia">
                <div class="card-titel">
                    <h3> Your Answered </h3>
                </div>
               
                <hr>
                <form action="{{ route('questions.answers.store',$question->id) }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">
                            {{ old('body') }}
                        </textarea>
                        @error('body')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-lg btn-outline-primary float-end d-inline p-2 ">
                        Submit
                    </button>
                  
                </form>
            </div>
        </div>
    </div>
</div>