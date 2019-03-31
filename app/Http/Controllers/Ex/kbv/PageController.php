<?php namespace App\Http\Controllers\Ex\Kbv;

use App\Http\Controllers\IssController;
use App\Ex\Helpers;

use App\Basic\Sys\User;
use App\Issuer;

use Illuminate\Http\Request;
use Session;
use Validator;

class PageController extends IssController
{
    public function index(){
        echo 'hello';
    }
    function path(){
        return app_path().'/Ex//'.$this->user()->public;
    }

}
