<?php

namespace App\Http\Controllers\Admin\Calendar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CalendarController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Calendar');
    }
}
