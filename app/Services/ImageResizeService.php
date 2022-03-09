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

public static function userImage_upload($userImageFile,$folderName){



    $userResizeImage=InterventionImage::make($userImageFile)
    ->resize(256,256)->encode();


    $userFileName = uniqid(rand().'_');
    $extension = $userImageFile->extension();
    $faileNameToUser = $userFileName.'.'.$extension;
    storage::put('public/' .$folderName . '/' . $faileNameToUser,$userResizeImage);
    return $faileNameToUser;
}

}
?>
