<?php

namespace App\Http\Middleware;

use Closure;

class CheckIframeHeader
{
    public function handle($request, Closure $next)
    {
        if ($request->header('X-Requested-With') !== 'com.exambrowser.client' && $request->header('X-Requested-With') !== 'com.cbt.exam.browser' && session('user')->status === 'Siswa') {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}
