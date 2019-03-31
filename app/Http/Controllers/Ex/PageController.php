<?php namespace App\Http\Controllers\Ex;

use App\Http\Controllers\IssController;
use App\Ex\Helpers;

use App\Basic\Sys\User;
use App\Issuer;

use Illuminate\Http\Request;
use Session;
use Validator;

class PageController extends IssController
{
    public function index(Request $req){
        echo 'aaaa';
    }
    function path(){
        return app_path().'/Ex//'.$this->user()->public;
    }

}
