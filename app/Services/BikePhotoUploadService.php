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
        if( $request->hasFile('image')) {
            $file = $request->file('image')->store('public/'.config('filesystems.bikesImageDir')) ;
            return pathinfo( $file, PATHINFO_BASENAME );
    }
  }

}
