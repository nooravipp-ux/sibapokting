<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = hash('sha512', $request->ip());
        
        if (DB::table('visitor')->where('tanggal', today())->where('ip_address', $ip)->count() < 1)
        {
            DB::table('visitor')->insert([
                'tanggal' => today(),
                'ip_address' => $ip,
            ]);
        }
        
        return $next($request);
    }
}