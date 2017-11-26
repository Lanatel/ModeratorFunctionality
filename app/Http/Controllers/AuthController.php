<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember')))
        {
            return redirect()->intended('/');
        }
        return redirect()->back()->withInput($request->all)->withErrors([
            'password' => 'Введено некоректний e-mail чи пароль',
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}