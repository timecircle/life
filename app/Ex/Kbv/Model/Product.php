<?php
namespace App\Ex\Kbv\Model;

use App\Ex\Kbv\Helper;

use DB;

class Product{
    public static function all()
    {
      $pdo = DB::connection()->getPdo();
      print_r($pdo);
      //Helper::DB();
      return Helper::DB()->select('select * from PRODUCT');
    }
}
