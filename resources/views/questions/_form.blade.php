<div class="form-group">
    <label for="question-title"> Question Title </label>
    <input type="text" name='title' value="{{ old('title',$question->title) }}" id="questions-title" class="form-control {{ $errors->has('title') ?'is-invalid': '' }}">
    @if ($errors->has('title'))
        <div class="invalid-feedback">
            <strong> {{ $errors->first('title') }}
        </div>
        
    @endif
</div>
<div class="form-group">
    <label for="question-title"> Question Body </label>
    <textarea type="text" name='body' id="questions-body" rows="10" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"> {{ old('body',$question->body) }}</textarea>
    @if ($errors->has('body'))
        <div class="invalid-feedback">
            <strong> {{ $errors->first('body') }}</strong>
        </div>
        
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary btn-lg"> {{ $buttonText }} </button>
</div>