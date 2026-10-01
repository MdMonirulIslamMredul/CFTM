<?php
function imageUpload($image, $directory)
{
    $imageExtension = $image->getClientOriginalExtension();
    $imageName      = rand(10000, 50000).'.'.$imageExtension;
    $image->move($directory, $imageName);
    return $directory.$imageName;
}
function fileUpload($file, $directory)
{
    $fileExtension = $file->getClientOriginalExtension();
    $fileName      = rand(10000, 50000).'.'.$fileExtension;
    $file->move($directory, $fileName);
    return $directory.$fileName;
}