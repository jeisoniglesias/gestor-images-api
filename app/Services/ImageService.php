<?php

namespace App\Services;

use App\Repositories\ImageRepository;

class ImageService
{
    private $imageRepository;
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    //get all images
    public function getAll()
    {
        return $this->imageRepository->all();
    }
}
