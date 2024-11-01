<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var array<string> $targetLocales */
        $targetLocales = [config('app.fallback_locale'), config('app.locale')];

        /** @var string $sourceLocale */
        $sourceLocale = config('app.fallback_locale');

        /** @var array<string> $available */
        $available = config('app.available_locales');

        $availableLocales = array_unique(array_merge($targetLocales, [$sourceLocale], $available));

        // Ordered by preference
        $priorityLocales = [
            ...$request->getLanguages(),
            $request->segment(1), // /en/
            $request->query('locale'),
            config('app.fallback_locale'),
            $sourceLocale,
        ];

        // Keep the locales included in $availableLocales
        $eligibleLocales = array_filter($priorityLocales, fn ($locale) => in_array($locale, $availableLocales));

        /** @var string $locale */
        // Take first locale
        $locale = reset($eligibleLocales);

        // Set Locale and Laravel PHP
        \App::setLocale($locale);

        return $next($request);
    }
}
