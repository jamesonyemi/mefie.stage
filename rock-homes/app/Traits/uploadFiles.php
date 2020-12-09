<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

trait UploadFiles
{
    
    public function store_uploaded_files($file_name, $directory) {
        
        if ( !empty($file_name) ) {

            $destinationPath   =  public_path() . $directory;
            $files             =  $file_name;   // will get all files

            foreach ($files as $file) {

                $file_name           =  date("Y-m-d h_i_s")."_".$file->getClientOriginalName();
                $full_path           =  $file->move($destinationPath, $file_name);  
                // $b64imageEncoded     =  base64_encode($file_name);
                // $fileNamesInArray[]  =  $file_name;
                // $base64img_encode[]  =  $b64imageEncoded;
                // $ImagePathInArray[]  =  static::$relativePath.$file_name;

            }
            
        }
        
        return "empty file";
    }
}


