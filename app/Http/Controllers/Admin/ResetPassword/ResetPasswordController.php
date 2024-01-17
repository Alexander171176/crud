<?php

namespace App\Http\Controllers\Admin\ResetPassword;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ResetPasswordController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('ResetPassword');
    }
}
