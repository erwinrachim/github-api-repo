<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema()
 */
class RepositoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'               => $this->resource['id'],
            'name'             => $this->resource['name'],
            'full_name'        => $this->resource['full_name'],
            'html_url'         => $this->resource['html_url'],
            'language'         => $this->resource['language'],
            'updated_at'       => $this->resource['updated_at'],
            'pushed_at'        => $this->resource['pushed_at'],
            'stargazers_count' => $this->resource['stargazers_count'],
        ];
    }
}
