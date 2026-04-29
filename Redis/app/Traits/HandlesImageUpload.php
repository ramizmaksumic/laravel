<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait HandlesImageUpload
{
    public function uploadImage(UploadedFile $file): string
    {
        $name = uniqid() . '.webp';

        $gd = new Driver();
        $manager = new ImageManager($gd);

        $image = $manager->read($file)->toWebp(90);

        Storage::disk('public')->put('images/avatars/' . $name, (string) $image);

        return $name;
    }
}
