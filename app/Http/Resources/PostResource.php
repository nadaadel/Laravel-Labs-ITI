<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use APP\User;

class PostResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
            'my new title' => $this->title,
            'body' => $this->body ,
            'user' => new UserResource(User::find($this->user->id)),
            'video' => false
        ];
        
    }
}
