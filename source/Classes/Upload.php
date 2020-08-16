<?php

namespace Source\Classes;

class Upload 
{
    private $errors;

    public static function validateFiles($files = [], int $maxNumberOfFiles = 1)
    {
        if (count($files) === 0 || $files === []) {
            return false;
        }

        if (count($files) > $maxNumberOfFiles) {
            return false;
        }

        // dd($files);

        foreach ($files as $image) {
            if (!Upload::validateFileType($image) || !Upload::validateFileSize($image)) {
                return false;
            }
        }

        return true;
    }

    private static function validateFileType($image)
    {
        if (!in_array(mime_content_type($image['tmp_name']), MIME_TYPES_UPLOAD)) {
            return false;
        }

        return true;
    }

    private static function validateFileSize($image)
    {
        if (!($image['size'] <= ((MAX_UPLOAD_SIZE * 1024) * 1024))) {
            return false;
        }

        return true;
    }

    public static function upload($file)
    {
        $fileExtension = mb_strstr($file['name'], '.') ;
        $newFilename = md5(uniqid()) . $fileExtension;

        $fullPath = PUBLIC_IMAGE_PATH . $newFilename;
        
        if (!move_uploaded_file($file['tmp_name'], $fullPath)) 
            return false;

        return $newFilename;
    }
}
