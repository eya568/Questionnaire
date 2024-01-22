@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Questionnaire</div>
                <div class="card-body">
                <form action="/questionnaires" method="post">
                    @csrf
                    <div class="form-group">
                      <label  for="title">title</label>
                      <input  name="title" type="text" class="form-control" id="title"  placeholder="Enter title"  value="{{old('title')}}">
                      <small id="titleHelp" class="form-text text-muted">choose a meaningful title.</small>
                      @error('title') 
                      <p class="text-danger">{{$message}}</p> 
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="purpose">purpose</label>
                        <input name="purpose" type="text" class="form-control" id="purpose"  placeholder="Enter your purpose" value="{{old('purpose')}}">
                        <small id="purposeHelp" class="form-text text-muted">describe your questionnaire accuratly.</small>
                    </div>
                    @error('purpose') 
                    <p class="text-danger">{{$message}}</p> 
                    @enderror
                    <button type="submit" class="btn btn-primary">Create questionnaire</button>
                </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection
