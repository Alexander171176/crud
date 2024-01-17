<?php

namespace App\Http\Controllers\Admin\Component;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BreadcrumbPageController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('component/BreadcrumbPage');
    }
}