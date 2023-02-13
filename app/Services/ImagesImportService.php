<?php

namespace App\Services;

use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use ZipArchive;

class ImagesImportService
{
    public $cachePath;
    public $realImagesPath;

    public function __construct($id)
    {
        $this->cachePath = storage_path('app/public/images-imports/' . $id);
        $this->realImagesPath = public_path('i/products/images');
    }

    public function extract($file)
    {
        $zip = new ZipArchive();
        $res = $zip->open($file);

        if ($res === TRUE) {
            $zip->extractTo($this->cachePath);
            $zip->close();

            return true;
        }
        return false;
    }

    public function checkImages()
    {
        $allowedMimeTypes = ['image/jpeg', 'image/png'];
        $files = File::allFiles($this->cachePath);
        $haveImages = false;

        foreach ($files as $file) {
            $contentType = mime_content_type($file->getRealPath());
            if(in_array($contentType, $allowedMimeTypes) ){
                $haveImages = true;
            } else {
                File::delete($file);
            }
        }

        return $haveImages;
    }

    public function checkFolder()
    {
        return File::exists($this->cachePath);
    }

    public function getFilesCount()
    {
        $files = File::allFiles($this->cachePath);

        return count($files);
    }

    public function handleImage()
    {
        $files = File::allFiles($this->cachePath);

        if(count($files) == 0) return false;

        $file = $files[0];
        $filename = $file->getFilename();
        $pImage = ProductImage::where('name', $filename)->exists();

        if(! $pImage) {
            File::delete($file);
            return false;
        }

        $this->resizeAndOptimizeImage($file);

        return File::move($file->getRealPath(), $this->realImagesPath . '/' . $filename);
    }

    public function resizeAndOptimizeImage($file)
    {
        Image::make($file->getRealPath())
            ->resize(
                2681,
                2000,
                function ($constraint) {
                    $constraint->aspectRatio();
                })
            ->save($file->getRealPath());

        ImageOptimizer::optimize($file->getRealPath());
    }

    public function deleteFolder()
    {
        return File::deleteDirectory($this->cachePath);
    }
}
