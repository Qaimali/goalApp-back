<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Goal extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'task'       => $this->task,
            'isDone'     => $this->isDone,
        ];
    }
}
