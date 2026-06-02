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
            $browser = 'Unknown';

            if (str_contains($userAgent, 'Edg/')) {
                $browser = 'Microsoft Edge';
            } elseif (str_contains($userAgent, 'Firefox/')) {
                $browser = 'Mozilla Firefox';
            } elseif (str_contains($userAgent, 'Chrome/')) {
                $browser = 'Google Chrome';
            } elseif (str_contains($userAgent, 'Safari/')) {
                $browser = 'Safari';
            }

            return response()->view('forbidden', [
                'browser' => $browser
            ]);
        }

        return $next($request);
    }
}
