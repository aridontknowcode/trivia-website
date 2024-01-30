<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function show()
    {
        return view('login');
    }
    public function showreg()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $name = $request->input('name');

        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('users')],
            // Add other validation rules for your form fields
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $password = bcrypt($request->password);
        $user->Password = $password;
        $user->save();

        return redirect()->route('user.login');
    }

    public function authenticate(Request $request)
    {
        // Validate the login request
        $request->validate([
            'name' => 'required',
            'password' => 'required|string',
        ]);
        // Attempt to log in the user using 'name' as the credential
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            // Authentication passed...
            // dd($request->all(), Auth::attempt(['name' => $request->name, 'password' => $request->password]));
            session(['username' => $request->name]);
            return redirect()->route('trivia.fetch'); // Redirect to a dashboard or any other route after successful login
        }
        // Authentication failed...
        return back()->withErrors(['name' => 'Invalid credentials']); // Redirect back with an error message
    }

    public function logout(){
        session()->flush();
        return redirect()->route('Home.page');
    }

    
}
