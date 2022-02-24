<?php

// サービスに切り離すときには必ずnamespaceが必要になる。
namespace App\Services;

// use文にInterventionImageも必要。
use InterventionImage;
use Illuminate\Support\Facades\Storage;


class ImageResizeService
{
    public static function upload($imageFile,$folderName){



            $resizeImage=InterventionImage::make($imageFile)
            ->resize(1920,1080)->encode();


            $fileName = uniqid(rand().'_');
            $extension = $imageFile->extension();
            $faileNameTofilm = $fileName.'.'.$extension;
            storage::put('public/' .$folderName . '/' . $faileNameTofilm,$resizeImage);
            return $faileNameTofilm;
}

}
?>
