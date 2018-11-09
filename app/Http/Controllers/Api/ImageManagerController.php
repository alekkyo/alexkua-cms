<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Managers\ImageManager;
use Illuminate\Http\Request;

class ImageManagerController extends Controller
{
    /** @var ImageManager $imageManager */
    protected $imageManager;

    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    /**
     * Image manager
     * @returns array
     */
    public function getImages()
    {
        return $this->imageManager->getImages();
    }

    /**
     * Upload an image
     * @param Request $request
     * @return \Response
     */
    public function uploadImage(Request $request)
    {
        try {
            logger($request->all());
            return response($this->imageManager->uploadImage($request));
        } catch (\Exception $e) {
            \Log::error($e->getTraceAsString());
            return response($e->getMessage(), 400);
        }
    }
}
