<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function Imagedestroy($img_id)
    {
        $data=ProductImage::where('id',$img_id)->first();
       // dd($data);
        Storage::delete($data->prod_image);
        ProductImage::where('id',$img_id)->delete();
        return redirect()->back();


    }
}
