<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CountPostVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $postId = $request->route('labo.front.actualites.allpost.details');

        if (!$request->session()->has("post_{$postId}_visited")) {
            // Increment the visit count for the post
            \DB::table('posts')->where('id', $postId)->increment('visits');

            // Mark the post as visited in the session
            $request->session()->put("post_{$postId}_visited", true);
        }

        return $next($request);
    }

}
