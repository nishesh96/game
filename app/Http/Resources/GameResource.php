<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class GameResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {


        return [
            'type'          => 'words',
            'id'            => (string)$this->id,
            'attributes'    => [
            'words' => $this->Words,


        return parent::toArray($request);
    }
}
