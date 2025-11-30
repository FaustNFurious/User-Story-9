<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DashboardController extends Controller implements HasMiddleware
{
    
    // Costruttore per applicare il middleware di autenticazione
    public static function middleware(): array
    {
        return [
            new Middleware('auth')
        ];
    }


    public function main()
    {
        return view('dashboard');
    }

}
