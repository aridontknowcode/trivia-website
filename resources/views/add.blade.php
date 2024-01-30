@extends('layouts.app')
@section('content')
<div class="container">
    <div class="center-container">
        <div class="center-content">
            <form action="{{route('trivia.added')}}" method="POST">
                @csrf
                <div class="form-group text-light p-4 col-md-12">
                    <label for="questionInput">Question</label>
                    <input type="text" class="form-control form-control-lg" id="questionInput" placeholder="Enter Question" name="question" autocomplete="off">
                </div>

                <div class="form-group p-4 toggle-buttons">
                    <button type="button" class="btn btn-success" onclick="setAnswer('True')" name="true_answer" value="1" >True</button>
                    <button type="button" class="btn btn-danger" onclick="setAnswer('False')" name="false_answer" value="0">False</button>
                    <input type="hidden" name="answer" id="answerInput">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection