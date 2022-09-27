<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BikePhotoUploadService
{
    /**
     * Update the avatar for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        // dd($request->get('file'));
        if($file = $request->hasFile('image')) {

            $file = $request->file('image') ;
            $fileName = date('is').$file->getClientOriginalName();
            $destinationPath = public_path().'/img/bikes' ;
            $file->move($destinationPath,$fileName);
            return '/img/bikes/'.$fileName;
    }
  }

}
