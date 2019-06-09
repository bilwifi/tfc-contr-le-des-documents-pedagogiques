<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Helper extends Controller
{
    public static function get_appreciation($nbr){
    	if ($nbr < 49) {
    		return  '<span class=" btn btn-danger">Insuffisance</span>';
    	}else if ($nbr >= 50 && $nbr <= 59 ) {
    		return  '<span class=" btn btn-warning">Assez-bon</span>';
    	}else if ($nbr >= 60 && $nbr <= 69 ) {
    		return  '<span class=" btn btn-info">Bon</span>';
    	}else if ($nbr >= 70 && $nbr <= 89 ) {
    		return  '<span class=" btn btn-primary">Très Bon</span>';
    	}else if ($nbr >= 90 && $nbr <= 100 ) {
    		return  '<span class=" btn btn-success">Elite</span>';
    	}
    }
}
