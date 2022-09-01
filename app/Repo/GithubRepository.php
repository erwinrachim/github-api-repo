<?php

namespace App\Repo;

use App\Helpers\CollectionHelper;
use App\Helpers\GithubApi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class GithubRepository implements GithubRepositoryInterface
{
    private $cacheTtl = 30 * 60;

    private function searchRepositories()
    {
        return Cache::remember(__CLASS__ . '/' . __FUNCTION__, $this->cacheTtl, function () {
            $repos = [];
            for ($i = 1; $i <= 5; $i++) {
                $response = GithubApi::search([
                    'q' => 'php',
                    'per_page' => 100,
                    'page' => $i,
                ]);

                $repos = array_merge($repos, $response['items']);
            }
            return collect($repos);
        });
    }

    public function all($perPage = 10)
    {
        $repos = $this->searchRepositories();

        return CollectionHelper::paginate($repos, $perPage);
    }

    public function allSortByPopularity($order = 'desc', $perPage = 10)
    {
        if ($order === 'desc') {
            $repos = $this->searchRepositories()->sortByDesc('stargazers_count');
        } else {
            $repos = $this->searchRepositories()->sortBy('stargazers_count');
        }

        return CollectionHelper::paginate($repos, $perPage);
    }

    public function allSortByActivity($order = 'desc', $perPage = 10)
    {
        if ($order === 'desc') {
            $repos = $this->searchRepositories()->sortByDesc(function ($repo) {
                return Carbon::parse($repo['updated_at'])->timestamp;
            });
        } else {
            $repos = $this->searchRepositories()->sortBy(function ($repo) {
                return Carbon::parse($repo['updated_at'])->timestamp;
            });
        }

        return CollectionHelper::paginate($repos, $perPage);
    }
}
