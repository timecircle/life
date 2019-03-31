<?php
namespace App\Ex\Kbv;
use Config;
use DB;

class Helper{
    public static function DB(){
      $db = [
        'driver' => 'sqlsrv',
        'host' => '45.122.221.138',
        'port' => '1433',
        'database' => 'EBIZZ_Test',
        'username' => 'ebizz2',
        'password' => '123456abc@'
      ];
      config(['database.connections.newcon' =>$db]);

      return DB::connection('newcon');
    }
}

?>
