<?php
namespace App\Helpers;
//prueba
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Url{
    public static function filterUrl($url_image){

                $url_array = explode('/', $url_image);

                $array_unique = array_unique($url_array);

                for($i=0; $i<3; $i++){
                    unset($array_unique[$i]);
                }
                $array_string = implode('/', $array_unique);

                return $array_string;
    }
}
