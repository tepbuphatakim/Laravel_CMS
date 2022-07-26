<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class APIPaginateCollection extends ResourceCollection
{
    public $pagination;
    private $resourceClass;
    public $resource;
    private $keyData;

    public function __construct($resource, $resourceClass, $keyData = 'data')
    {
        parent::__construct($resource);

        $this->resource = $this->collectResource($resource);
        $this->resourceClass = $resourceClass;
        $this->keyData = $keyData;

    }

    public function toArray($request)
    {
        return [
            $this->keyData => $this->resourceClass::collection($this->collection),
            'pagination' => [
                'page' => $this->resource->currentPage(),
                'last_page' => $this->resource->lastPage(),
                'limit' => $this->resource->perPage(),
                'total' => $this->resource->total()
            ]
        ];
    }
}
