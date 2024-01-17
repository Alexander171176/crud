<?php

namespace App\Http\Controllers\Admin\Signin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SigninController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Signin');
    }
}
