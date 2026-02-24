<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuditLog
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            Log::info('AUDIT_LOG', [
                'user_id' => auth()->id(),
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'time' => now(),
            ]);
        }

        return $next($request);
    }
}
