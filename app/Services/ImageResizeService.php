<?php

// サービスに切り離すときには必ずnamespaceが必要になる。
namespace App\Services;

// use文にInterventionImageも必要。
use InterventionImage;
use Illuminate\Support\Facades\Storage;


class ImageResizeService
{
    // 画像をリサイズして登録する関数(1920*1080)
    public static function upload($imageFile,$folderName){



            $resizeImage=InterventionImage::make($imageFile)
            ->resize(1920,1080)->encode();


            $fileName = uniqid(rand().'_');
            $extension = $imageFile->extension();
            $faileNameTofilm = $fileName.'.'.$extension;
            storage::put('public/' .$folderName . '/' . $faileNameTofilm,$resizeImage);
            return $faileNameTofilm;
}


 // 画像をリサイズして登録する関数(256*256)
public static function userImage_upload($userImageFile,$folderName){



    $userResizeImage=InterventionImage::make($userImageFile)
    ->resize(256,256)->encode();

    // 画像のファイル名を生成している。
    $userFileName = uniqid(rand().'_');
    // 拡張子取得
    $extension = $userImageFile->extension();
    // ランダムで付けた名前と拡張子を結合して変数に格納
    $faileNameToUser = $userFileName.'.'.$extension;
    storage::put('public/' .$folderName . '/' . $faileNameToUser,$userResizeImage);
    return $faileNameToUser;
}

}
?>
