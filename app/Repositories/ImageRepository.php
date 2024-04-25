<?php

namespace App\Repositories;

use App\Models\Image;

class ImageRepository
{
    private $model;
    public function __construct(Image $model)
    {
        $this->model = $model;
    }

    public function create(array $data): Image
    {
        //dd($data);
        return $this->model->create($data);
    }
    //get all images
    public function all()
    {
        return $this->model->all();
    }
}
