<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OfficeNetwork
{
    public function handle(Request $request, Closure $next)
    {
        $officeIP = env('OFFICE_IP');
        $currentIP = $request->ip();

        // Allow localhost during local development only
        if (app()->environment('local') &&
            in_array($currentIP, ['127.0.0.1', '::1'])) {
            return $next($request);
        }

         // Allow only office network in production
        if ($currentIP !== $officeIP) {
            abort(403, 'Login is allowed only from the office network.');
        }

        return $next($request);
    }
}