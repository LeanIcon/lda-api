<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the current route belongs to a Filament API service
        if ($this->isApiRequest($request)) {
            $apiKey = $request->header('X-API-KEY'); // Adjust header name if needed

            // Validate the API key using your logic
            if (!$this->validateApiKey($apiKey)) {
                return abort(401, 'Unauthorized');
            }
        }
        return $next($request);
    }

    private function isApiRequest(Request $request): bool
    {
        $route = $request->route();
        return $route && $route->is('filament-api/*'); // Adjust prefix if needed
    }

    private function validateApiKey(string $apiKey): bool
    {
        // Implement your logic to validate the API key
        // (e.g., compare against a stored list or database)
        return true; // Replace with your actual validation logic
    }
}
