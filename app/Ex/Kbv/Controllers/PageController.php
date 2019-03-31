<?php namespace App\Ex\Kbv\Controllers;
use App\Http\Controllers\IssController;
use App\Ex\Kbv\Model\Product;

use App\Basic\Sys\User;
use App\Issuer;

use Illuminate\Http\Request;
use Session;
use Validator;

class PageController extends IssController
{
    public function index($page){
      switch ($page) {

        case 'mission':
            print_r(Product::all());
          break;

        default:
          $say = 'hello';
          return view('ex.kbv.dashboard',compact('say'));
          break;
      }
    }
    function path(){
        return app_path().'/Ex//'.$this->user()->public;
    }

}
