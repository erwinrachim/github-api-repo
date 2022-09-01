<?php

namespace App\Repo;

interface GithubRepositoryInterface
{
    public function all($perPage = 10);

    public function allSortByPopularity($order = 'desc', $perPage = 10);

    public function allSortByActivity($order = 'desc', $perPage = 10);
}
