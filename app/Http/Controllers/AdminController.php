<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminController extends Controller {
    public function index() {
        if (Auth::user()->can('ATM') ||
            Auth::user()->can('DATM') ||
            Auth::user()->can('TA') ||
            Auth::user()->can('ATA') ||
            Auth::user()->can('WM') ||
            Auth::user()->can('AWM') ||
            Auth::user()->can('FE') ||
            Auth::user()->can('AFE') ||
            Auth::user()->can('EC') ||
            Auth::user()->can('AEC')
        ) {
            return View::make('site.home');
        }
        return View::make('admin.home');
    }

}
    