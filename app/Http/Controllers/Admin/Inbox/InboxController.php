<?php

namespace App\Http\Controllers\Admin\Inbox;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InboxController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Inbox');
    }
}
