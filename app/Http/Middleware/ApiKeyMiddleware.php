<?php

namespace App\Http\Middleware;

use App\Models\ApiKey;
use App\Models\User;
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
      $apiKey = $request->header('x-api-key');

      if (!$apiKey) {
        return response()->json(['error' => 'API key is missing'], 401);
      }

      $apikey = ApiKey::where('key', $apiKey)->first();

      if (!$apikey) {
        return response()->json(['error' => 'Invalid API key'], 401);
      }

      $user = $apikey->user;

      if (!$user) {
          return response()->json(['error' => 'User not found'], 404);
      }

      $request->user = $user;
      return $next($request);
    }
}
