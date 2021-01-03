<?php


namespace App\Repositories;
use Illuminate\Http\Request;

interface UserInterface extends BaseRepositoryInterface
{

    public function create(array $datas);

    public function updateImage(array $datas);

}
