@extends('layouts.app')

@section('content')

<div class="container">

    <div class="Greeting">
        <div class="center-container">
            
            <div class="center-content">
                <h1>
                    <a href="" class="typewrite" data-period="1000" data-type='[ "Hi, My name is Harith." ,"I am a Computer Science Student.", "This is a Trivia Website !","Press the button below to start answering trivia !"]'>
                      <span class="wrap"></span>
                    </a>
                </h1>
                <div ontouchstart="">
                    <div class="button">
                      <a href="{{route('user.login')}}">Press Me</a>
                    </div>
                  </div>
                
            </div>
        </div>
        
    </div>
    

</div>


@endsection