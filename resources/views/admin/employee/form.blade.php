<div class="form-group {{ $errors->has('Name') ? 'has-error' : ''}}">
    <label for="Name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="Name" type="text" id="Name" value="{{ isset($employee->Name) ? $employee->Name : ''}}" >
    {!! $errors->first('Name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
    <label for="age" class="control-label">{{ 'Age' }}</label>
    <input class="form-control" name="age" type="text" id="age" value="{{ isset($employee->age) ? $employee->age : ''}}" >
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($employee->address) ? $employee->address : ''}}" >
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($employee->phone) ? $employee->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
