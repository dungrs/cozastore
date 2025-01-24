<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function __construct() {

    }

    public function index() {
        $config = $this->config();
        if (Auth::id() > 0) {
            return redirect()->view('dashboard.index');
        }
        return view('backend.auth.login', compact(
            'config'
        ));
    }

    public function login(AuthRequest $request) {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index')->with('success', 'Đăng nhập thành công!');
        }

        return redirect()->route('auth.admin')->with('error', "Email hoặc Mật khẩu không chính xác");
    }

    public function logout() {

    }

    public function config() {
        return [
            'js' => [
                'backend/js/pages/form-validation.js'
            ]
        ];
    }
}
