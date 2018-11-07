<?php

namespace App\Managers;

use App\Models\Category;
use Illuminate\Http\Request;

class ImageManager
{
    /**
     * Get all images in folder
     * @returns array
     */
    public function getImages()
    {
        return \Storage::disk('image-manager')->files();
    }

    /**
     * Upload an image
     * @param Request $request
     * @return string
     * @throws \Exception
     */
    public function uploadImage(Request $request)
    {
        if (!$request->exists('image')) {
            throw new \Exception ('Invalid image');
        }

        $file = $request->file('image');
        do {
            $name = uniqid() . "." . $file->getClientOriginalExtension();
        } while (!\Storage::disk('image-manager')->exists($name));
        if (\Storage::disk('image-manager')->putFileAs('/', $file, $name, 'public')) {
            return \Storage::disk('image-manager')->url($name);
        } else {
            throw new \Exception ('Error, cannot upload');
        }
    }
}