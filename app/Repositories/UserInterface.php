<?php


namespace App\Repositories;
use Illuminate\Http\Request;

interface UserInterface extends BaseRepositoryInterface
{

    public function create(array $datas);

    public function createImage($path,$id,$model);

    public function checkNotNul($req,$atr);

}
