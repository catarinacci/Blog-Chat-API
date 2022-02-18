<?php
namespace App\Helpers;
//prueba
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Url{
    public static function filterUrl($url_image){

                $url = public_path(Storage::url($url_image));
                $url_array = explode('/', $url);
                $array_unique = array_unique($url_array);
                $array_string = implode('/', $array_unique);
                if(count($url_array) > count($array_unique)){
                    $url = $array_string;
                }else{
                    $url = public_path(Storage::url($url_image));
                }

                return $url;
    }
}
