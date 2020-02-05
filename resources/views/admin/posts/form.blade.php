<div class="form-group {{ $errors->has('Mehedi') ? 'has-error' : ''}}">
    <label for="Mehedi" class="control-label">{{ 'Mehedi' }}</label>
    <input class="form-control" name="Mehedi" type="text" id="Mehedi" value="{{ isset($post->Mehedi) ? $post->Mehedi : ''}}" >
    {!! $errors->first('Mehedi', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tv') ? 'has-error' : ''}}">
    <label for="tv" class="control-label">{{ 'Tv' }}</label>
    <input class="form-control" name="tv" type="text" id="tv" value="{{ isset($post->tv) ? $post->tv : ''}}" >
    {!! $errors->first('tv', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
