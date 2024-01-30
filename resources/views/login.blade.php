@extends('layouts.app')

@section('content')
    <div class="center-container">
        <div class="center-content">
            <form action="{{ route('user.loging') }}" method="POST">
                @csrf
                <div class="form-group text-light p-4 col-md-12">
                    <label for="nameInput">Name</label>
                    <input type="text" class="form-control form-control-lg" id="nameInput" placeholder="Enter name"
                        name="name" autocomplete="off">
                </div>
                <div class="form-group text-light p-4 col-md-12">
                    <label for="passwordInput">password</label>
                    <input type="text" class="form-control form-control-lg" id="passwordInput"
                        placeholder="Enter password" name="password" autocomplete="off">
                </div>
                <div class="donthaveacc pb-3">
                    <a type="" class="" href="{{ route('user.register') }}">CLick here to register</a>
                </div>
                <div class="submit">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

            </form>
        </div>
    </div>
    </div>
@endsection
