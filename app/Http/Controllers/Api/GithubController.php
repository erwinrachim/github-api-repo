<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\IndexActivityRequest;
use App\Http\Requests\Api\IndexRequest;
use App\Http\Resources\RepositoryResource;
use App\Repo\GithubRepositoryInterface;

class GithubController extends Controller
{

    private $githubRepository;

    public function __construct(GithubRepositoryInterface $githubRepository)
    {
        $this->githubRepository = $githubRepository;
    }

    /**
     *
     * @OA\Get(
     *  path="/api/php",
     *  summary="Search Topic",
     *  @OA\Parameter(ref="#/components/parameters/page"),
     *  @OA\Parameter(ref="#/components/parameters/per_page"),
     *  @OA\Response(response=200, description="Success response", @OA\JsonContent(
     *      @OA\Property(
     *          property="data",
     *          ref="#/components/schemas/RepositoryResource"
     *      )
     * )),
     *  @OA\Response(response=401, ref="#/components/responses/401"),
     *  @OA\Response(response=403, ref="#/components/responses/403"),
     *  @OA\Response(response=413, ref="#/components/responses/413"),
     *  @OA\Response(response=422, ref="#/components/responses/422"),
     *  @OA\Response(response=500, ref="#/components/responses/500"),
     * )
     *
     * @param  string  $topic
     * @return \Illuminate\Http\Response
     */
    public function search(IndexRequest $request)
    {
        $perPage = $request->get('per_page', 10);

        try {
            $repos = $this->githubRepository->all($perPage);
            $repos->appends($request->all());
            return RepositoryResource::collection($repos);
        } catch (\Exception $e) {
            report($e);
            return response()->json(['error' => $e->getMessage()], 403);
        }
    }

    /**
     *
     * @OA\Get(
     *  path="/api/popularity/php",
     *  summary="Search PHP Topic sorted by popularity",
     *  @OA\Parameter(ref="#/components/parameters/page"),
     *  @OA\Parameter(ref="#/components/parameters/per_page"),
     *  @OA\Parameter(ref="#/components/parameters/order"),
     *  @OA\Response(response=200, description="Success response", @OA\JsonContent(
     *      @OA\Property(
     *          property="data",
     *          ref="#/components/schemas/RepositoryResource"
     *      )
     * )),
     *  @OA\Response(response=401, ref="#/components/responses/401"),
     *  @OA\Response(response=403, ref="#/components/responses/403"),
     *  @OA\Response(response=413, ref="#/components/responses/413"),
     *  @OA\Response(response=422, ref="#/components/responses/422"),
     *  @OA\Response(response=500, ref="#/components/responses/500"),
     * )
     *
     * @param  string  $topic
     * @return \Illuminate\Http\Response
     */
    public function popularity(IndexActivityRequest $request)
    {

        $perPage = $request->get('per_page', 10);
        $order = $request->get('order', 'desc');

        try {
            $repos = $this->githubRepository->allSortByPopularity($order, $perPage);
            $repos->appends($request->all());
            return RepositoryResource::collection($repos);
        } catch (\Exception $e) {
            report($e);
            return response()->json(['error' => $e->getMessage()], 403);
        }
    }

    /**
     *
     * @OA\Get(
     *  path="/api/activity/php",
     *  summary="Search Topic sorted by popularity",
     *  @OA\Parameter(ref="#/components/parameters/page"),
     *  @OA\Parameter(ref="#/components/parameters/per_page"),
     *  @OA\Parameter(ref="#/components/parameters/order"),
     *  @OA\Response(response=200, description="Success response", @OA\JsonContent(
     *      @OA\Property(
     *          property="data",
     *          ref="#/components/schemas/RepositoryResource"
     *      )
     * )),
     *  @OA\Response(response=401, ref="#/components/responses/401"),
     *  @OA\Response(response=403, ref="#/components/responses/403"),
     *  @OA\Response(response=413, ref="#/components/responses/413"),
     *  @OA\Response(response=422, ref="#/components/responses/422"),
     *  @OA\Response(response=500, ref="#/components/responses/500"),
     * )
     *
     * @param  string  $topic
     * @return \Illuminate\Http\Response
     */
    public function activity(IndexActivityRequest $request)
    {
        $perPage = $request->get('per_page', 10);
        $order = $request->get('order', 'desc');

        try {
            $repos = $this->githubRepository->allSortByActivity($order, $perPage);
            $repos->appends($request->all());
            return RepositoryResource::collection($repos);
        } catch (\Exception $e) {
            report($e);
            return response()->json(['error' => $e->getMessage()], 403);
        }
    }
}
