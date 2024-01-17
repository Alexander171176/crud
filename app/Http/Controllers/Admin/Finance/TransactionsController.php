<?php

namespace App\Http\Controllers\Admin\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransactionsController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('finance/Transactions');
    }
}