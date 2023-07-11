<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CodeLab
{

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role != 'admin') {
            return back()->with(["authMessage"=>"You don't have permission to access this page. You are not admin account."]);
        }
        echo "<h2>CodeLab middleware</h2>";
        return $next($request);
    }
}
