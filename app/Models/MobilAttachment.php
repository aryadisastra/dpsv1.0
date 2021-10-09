<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobilAttachment extends Model
{
    protected $table = 'mobil_attachment';
    protected $primaryKey = 'id_file';

    static function generateNameImages()
    {
        $dmy = "";
        $value = $dmy . date("y") . date("m") . date("d") . date("H") . date("i") . date("s");
        $length = 5;
        $characters = '1234567890';
        $charactersLength = strlen($characters);
        $randomstring = '';
        for($i=0 ; $i < $length; $i++)
        {
            $randomstring .= $characters[rand(0,$charactersLength - 1)]; 
        }
        return $value."_".$randomstring ;
    }
}
