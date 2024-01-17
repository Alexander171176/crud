<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PlansController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('settings/Plans');
    }
}
