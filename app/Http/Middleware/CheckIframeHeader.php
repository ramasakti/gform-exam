<?php

namespace App\Http\Middleware;

use Closure;

class CheckIframeHeader
{
    public function handle($request, Closure $next)
    {
        $userAgent = $request->userAgent();
        $isSEB = str_contains($userAgent, 'SEB/');

        if (
            $request->header('X-Requested-With') !== 'com.exambrowser.client' &&
            $request->header('X-Requested-With') !== 'com.cbt.exam.browser' &&
            !$isSEB &&
            session('user')->status === 'Siswa'
        ) {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}