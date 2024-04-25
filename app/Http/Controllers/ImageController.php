<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use App\Services\ImageService;
use App\Services\ImageUploadService;



class ImageController extends Controller
{
    private $uploadService;
    private $service;
    public function __construct(ImageUploadService $uploadService, ImageService $service)
    {
        $this->uploadService = $uploadService;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $images = $this->service->getAll();

        return response()->json([
            'message' => 'Images retrieved successfully',
            'images' => $images,
        ], 200);
    }

    public function upload(StoreImageRequest $request)
    {

        $image = $this->uploadService->upload($request);

        return response()->json([
            'message' => 'Image uploaded successfully',
            'image' => $image,
        ], 201);
        //$this->imageService->upload($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
