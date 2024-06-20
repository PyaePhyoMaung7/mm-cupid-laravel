<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            return view('backend.dashboard');

        } catch (\Exception $e) {
            dd($e.getMessage());
        }
    }
}
