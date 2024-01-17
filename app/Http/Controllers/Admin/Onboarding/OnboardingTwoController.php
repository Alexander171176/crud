<?php

namespace App\Http\Controllers\Admin\Onboarding;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OnboardingTwoController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Onboarding02');
    }
}
