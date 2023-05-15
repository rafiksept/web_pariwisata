<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckisVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $pax_order= DB::table('tickets')->where('code', $code) -> get();

        $code= $request->route()->parameter('code');
        $pop= DB::table('proof_of_payments')->where('uuid', $code) -> get();
        if (($pop[0] -> is_verify)) {
            abort(403, "anda tidak bisa mengedit halaman ini lagi");
        }
    
        return $next($request);
    }
}
