<?php

namespace App\Http\Controllers;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('components.image_manager');
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
