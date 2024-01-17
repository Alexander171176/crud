<?php

namespace App\Http\Controllers\Admin\Signup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SignupController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Signup');
    }
}
