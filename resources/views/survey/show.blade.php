@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" method="post">
                @csrf
                @foreach($questionnaire->questions as $key=>$question)
                <div class="card mt-3">
                    <div class="card-header"><strong>{{$key + 1}}</strong> {{$question->question}}</div>
                    <div class="card-body">
                        @error('responses.' .$key.'.answer_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                        <ul class="list-group">
                            @foreach($question->answers as $answer)
                            <label for="answer{{$answer->id}}">
                                <li class="list-group-item">
                                    <input type="radio" name="responses[{{$key}}][answer_id]" id="answer{{$answer->id}}" 
                                    class="form-check-input" value="{{$answer->id}}" 
                                    {{(old('responses.' .$key .'.answer_id')==$answer->id) ? 'checked':''}}>
                                    <input type="hidden" name="responses[{{$key}}][question_id]" id="question{{$question->id}}"  value="{{$question->id}}">
                                    {{$answer->answer}}
                                </li>
                            </label>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
                <div class="card mt-3">
                    <div class="card-header">Create New Questionnaire</div>
                    
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                          <label  for="survey.name">name</label>
                          <input  name="survey[name]" type="text" class="form-control" id="name"  placeholder="Enter name"  value="{{old('name')}}">
                          <small id="nameHelp" class="form-text text-muted">Enter your name.</small>
                          @error('survey.name') 
                          <p class="text-danger">{{$message}}</p> 
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="survey.email">email</label>
                            <input name="survey[email]" type="email" class="form-control" id="email"  placeholder="Enter your email" value="{{old('email')}}">
                            <small id="emailHelp" class="form-text text-muted">Your email pls</small>
                        </div>
                        @error('survey.email') 
                        <p class="text-danger">{{$message}}</p> 
                        @enderror
                        <div><button class="btn btn-dark" type="submit">Complete survey</button></div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
