<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Auth;

class UploadPhoto extends Controller
{
    
    private static $photoPath   =   '/client-logo/';

    public function updatedPhoto(Request $request)
    {
        
        $request->validate([
            'photo_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $this->processImageUpload($request->file('photo_url'));
        
        return  back()->with('success','Client Logo Updated successfully');
        
    }
    
    public function processImageUpload($photo)
    {
        
        $imageName   = time().'.'.$photo->extension();
        $photo_url   = static::$photoPath.$imageName;
        $destination = $photo->move(public_path(static::$photoPath), $imageName);
        $data       =  ['photo_url' => $photo_url ];
        
        DB::table('users')->where('id', Auth::id())->update( array_merge_recursive($data) );
        
        
    }
}
