<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function storeBase64Image(string $base64Image, string $ext, string $directory = 'uploads'): ?string
    {
        try {

            $imageData = base64_decode($base64Image);
            // Determine the file extension
            $extension = $this->getExtension($ext);
            // dd($extension);
            if (!$extension) {
                throw new \Exception('Unsupported image type.');
            }
            // Generate a unique filename
            $fileName = time() . '.' . $extension;
            // Store the image
            $path = $directory . '/' . $fileName;
            Storage::disk('public')->put($path, $imageData);
            return $path;

        } catch (\Exception $e) {
            // Handle exceptions (e.g., log them)
            return null;
        }
    }

    private function getExtension(string $extention): ?string
    {
        if (empty($extention)) {
            return null; // or false if you prefer
        }
        $ext = '';

        if ($extention == 'image/png') {
            $ext = 'png';
        } elseif ($extention == 'image/jpeg' || $extention == 'image/jpg') {
            $ext = 'jpeg';
        } elseif ($extention == 'image/gif') {
            $ext = 'gif';
        } elseif ($extention == 'image/webp') {
            $ext = 'webp';
        } elseif ($extention == 'image/bmp') {
            $ext = 'bmp';
        } elseif ($extention == 'image/tiff') {
            $ext = 'tiff';
        } elseif ($extention == 'image/svg+xml') {
            $ext = 'svg';
        } else {
            $ext = null;
        }

        return $ext;
    }



    public function deleteImage(string $imageUrl): bool
    {
        // Extract the path from the URL by removing the base URL (Storage::url(''))
        $path = str_replace(Storage::url(''), '', $imageUrl);
        // Ensure the path does not have a leading slash
        $path = ltrim($path, '/');
        // Full path to the file on the local filesystem
        $fullPath = storage_path('app/public/' . $path);
        if (file_exists($fullPath)) {
            // Attempt to delete the file using unlink() (directly)
            return unlink($fullPath);
        }
        return false;
    }




}
