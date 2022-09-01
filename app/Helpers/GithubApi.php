<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class GithubApi
{
    public static function search($params)
    {
        $response = Http::withToken(env('GITHUB_TOKEN'))
            ->get('https://api.github.com/search/repositories', $params);

        return $response->json();
    }
}
