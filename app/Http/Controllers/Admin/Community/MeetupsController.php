<?php

namespace App\Http\Controllers\Admin\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MeetupsController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('community/Meetups');
    }
}