<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class LogUserActivity
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
        $user = Auth::user();
        $cacheKey = 'user-online-' . $user->id;
        
        // Update cache
        Cache::put($cacheKey, true, now()->addMinutes(5));
        
        // Also update database
        $user->last_activity = now();
        $user->save(['timestamps' => false]); // Don't update updated_at
    }

        return $next($request);
    }
}
