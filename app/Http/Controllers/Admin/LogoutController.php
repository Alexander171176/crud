<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LogoutController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('LogoutComponent');
    }
}
