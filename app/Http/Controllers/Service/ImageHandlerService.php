<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageHandlerService extends Controller
{
    public static function fileUploader(string $dir, $image = null, $oldImage = null)
    {


        if (!empty($oldImage) && file_exists(public_path($dir . $oldImage))) {
            unlink(public_path($dir . $oldImage));
        }

        if (!file_exists(public_path($dir))) {
            mkdir(public_path($dir), 0777, true);
        }

        $extension = $image->getClientOriginalExtension();
        $imageName = Carbon::now()->toDateString() . '_' . uniqid() . '.' . $extension;

        $image->move(public_path($dir), $imageName);
        return $imageName;
    }

    public static function delete(string $dir, $oldImage = null): bool
    {
        $dir = rtrim($dir, '/') . '/';

        if (!empty($oldImage) && file_exists(public_path($dir . $oldImage))) {
            unlink(public_path($dir . $oldImage));
            return true;
        }

        return false;
    }
}
