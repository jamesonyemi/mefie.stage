<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class OnsiteVisitFileUploadController extends Controller
{
    
    private static $relative_path  =  '/project-documents/';

    public static function processFileUpload($files, $id) {
        
      $directory   =  public_path() . static::$relative_path;
        
            foreach ($files as $file) {
    
                    $file_name           =  date("Y-m-d h_i_s")."_".$file->getClientOriginalName();
                    $b64imageEncoded     =  base64_encode($file_name);
                    $full_path           =  $file->move($directory, $file_name);  
                    $fileNamesInArray[]  =  $file_name;
                    $base64img_encode[]  =  $b64imageEncoded;
                    $ImagePathInArray[]  =  static::$relative_path.$file_name;
    
                }
            
            
        
    }
    

    
}
