<?php

namespace App\Classes;

class Image
{
    /**
     * @param UploadedFolderName $folder
     * @param RequestImage $image
     * @return void
     */


    public function handleUploadedImage($folder,$image)
    {
        if (!is_null($image)) {
            $name = $this->imageName($image);
            $image->move(public_path($folder),$name);
        }
    }

    /**
     * @param RequestImage $image
     * @return string
     */

    private function imageName($image)
    {
        $extension = $image->getClientOriginalExtension();
        $partial = md5(uniqid(time()));
        $name = $partial.'.'.$extension;
        return $name;
    }

    /**
     * @param DeletedFolderName $folder
     * @param ImageName $image
     * @return void
     */

    public function destroyImage($folder,$image)
    {
        $path = public_path($folder.'/'.$image);
        if(file_exists($path))
        {
            unlink($path);
        }
    }
}
