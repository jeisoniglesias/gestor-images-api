<?php

namespace App\Services;

use App\Http\Requests\StoreImageRequest;
use App\Repositories\ImageRepository;

class ImageUploadService
{
    private $imageRepository;
    private $diskPath;
    public function __construct(ImageRepository $imageRepository, $diskPath = 'images')
    {
        $this->imageRepository = $imageRepository;
        $this->diskPath = $diskPath;
    }
    public function upload(StoreImageRequest $request)
    {
        $file = $request->file('image');
        $type = $request->input('type');
        //$fileName = time() . '_' . $file->getClientOriginalName() . '_' . $type;
        $fileName = time() . '.' . $file->extension();
        $request->image->storeAs('public/images', $fileName);

        $filePath = $file->storeAs($this->diskPath, $fileName, 'public');

        // Create a new image record
        $data = [
            'name' => $file->getClientOriginalName(),
            'path' => $filePath,
            'type' => $type,
        ];
        $image = $this->imageRepository->create($data);

        // Implement backup to cloud storage if needed

        return $image;
    }
}
