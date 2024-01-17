<?php

namespace App\Http\Controllers\Admin\Fintech;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FintechController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Fintech');
    }
}
