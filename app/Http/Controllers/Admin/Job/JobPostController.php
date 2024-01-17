<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobPostController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('job/JobPost');
    }
}
