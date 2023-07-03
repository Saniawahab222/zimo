<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
      
   
   
   
   
   
   
    public function showRegistrationForm()
    {
        return view('forms.register');
    }









    
        // This Function Will Register a New User
    public function register(Request $request)
    {

      
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required',
            'country' => 'required',
        ]);

        $user = User::create([
            
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'phone' => $request->phone,

            
        ]);

        // Create a login token here if required for API
        return redirect('/login-form');
    }







    //This Function Will Login Users

    public function showLoginForm()
    {
        return view('forms.login');
    }








    // THIS FUNCTION WILL LOGIN NEW USER
    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return view('productAjax');
        } 

        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     // Authentication successful
        //     $token = auth()->user()->createToken('web')->plainTextToken;
        //     // Redirect to authenticated page or perform other actions
        //     return redirect('/')->with('success', 'Login successful! Token: ' . $token);
        // } else {
        //     // Authentication failed
        //     return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        // }

        return response()->json(['message'=>$token,'error'=>'null']);
    }



    //This Function Will Show Navbar

        public function showNavbar()
        {
            return view('productAjax');
        }



//         //This Function Will Show 
//         public function showUserData($country)
// {
//     $users = User::where('country', $country)->get();
    
//     return DataTables::of($users)->make(true);
// }


}
