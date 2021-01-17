<?php


namespace App\Repositories;


use App\Models\Image;
use App\Models\User;

class UserRepository extends BaseRepository implements UserInterface
{
    public $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function createImage($path,$id,$model)
    {
        Image::create([
            'path' => $path,
            'imageable_id' => $id,
            'imageable_type' => $model,
        ]);
    }

    public function checkNotNul($req, $atr)
    {
        strlen($req) > 0 ? $atr = $req : '';
    }

}
