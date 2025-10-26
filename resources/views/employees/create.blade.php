@extends('layout')

@section('page-content')
    <legend>Create Employee</legend>
    <form method="" action="#">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Name </label>
            <div class="col-sm-10">
                <input type="text" class="form-control is-invalid " value="" id="title" name="name"
                       placeholder="Name">
                <div class="invalid-feedback">Error message</div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection



