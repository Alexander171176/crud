<?php

namespace App\Http\Controllers\Admin\Component;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DropdownPageController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('component/DropdownPage');
    }
}
