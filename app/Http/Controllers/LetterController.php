<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    function linkLetterAndNumber($number){

        if (strlen($number)!=8){
            return "Valid number needs to be 8 digits";
        }

        $mod = (int)$number%23;

        $letters = Letter::find($mod+1);

        echo $number . $letters->letters;

    }
}
