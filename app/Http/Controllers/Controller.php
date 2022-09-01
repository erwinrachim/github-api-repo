<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Api documentation",
 *      description="Api documentation",
 *      @OA\Contact(
 *          email="admin@admin.com"
 *      ),
 * )
 *
 * @OA\PathItem(path="/api")
 *
 * @OA\Parameter(
 *      parameter="page",
 *      in="query",
 *      name="page",
 *      description="The current page for the result set, defaults to *1*",
 *      @OA\Schema(
 *          type="integer",
 *          default=1,
 *      )
 * )
 *
 *  @OA\Parameter(
 *      parameter="per_page",
 *      in="query",
 *      name="per_page",
 *      description="The limit data per page, defaults to *10*",
 *      @OA\Schema(
 *          type="integer",
 *          default=10,
 *      )
 * )
 *
 *   @OA\Parameter(
 *      parameter="order",
 *      name="order",
 *      in="query",
 *      description="Determines whether the first search result returned is the highest number of matches (desc) or lowest number of matches (asc).",
 *      required=false,
 *      @OA\Schema(
 *          type="string",
 *          enum={"asc", "desc"}
 *      )
 *  ),
 *
 * @OA\Schema(
 *      schema="Error",
 *      @OA\Property(
 *          type="string",
 *          property="message",
 *          description="Error Message"
 *      )
 * )
 *
 * @OA\Schema(
 *      schema="ValidationError",
 *      allOf={
 *          @OA\Schema(ref="#/components/schemas/Error"),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="errors",
 *                  @OA\Property(
 *                      property="parameter",
 *                      type="array",
 *                      @OA\Items(type="string")
 *                  )
 *              )
 *          )
 *      }
 *  )
 *
 * @OA\Response(
 *      response="401",
 *      description="Unauthenticated",
 *      @OA\JsonContent(ref="#/components/schemas/Error")
 * )
 *
 * @OA\Response(
 *      response="403",
 *      description="Forbidden",
 *      @OA\JsonContent(ref="#/components/schemas/Error")
 * )
 *
 * @OA\Response(
 *      response="413",
 *      description="Request Entity Too Large",
 *      @OA\JsonContent(ref="#/components/schemas/Error")
 * )
 *
 * @OA\Response(
 *      response="404",
 *      description="Entity Not Found",
 *      @OA\JsonContent(ref="#/components/schemas/Error")
 * )
 *
 * @OA\Response(
 *      response="422",
 *      description="Unprocessable Entity",
 *      @OA\JsonContent(ref="#/components/schemas/ValidationError")
 * ),
 *
 * @OA\Response(
 *      response="500",
 *      description="Internal Server Error",
 *      @OA\JsonContent(ref="#/components/schemas/Error")
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
