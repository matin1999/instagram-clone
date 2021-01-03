<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository extends BaseRepository implements UserInterface
{
    public $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function updateImage(array $datas)
    {

    }

}
