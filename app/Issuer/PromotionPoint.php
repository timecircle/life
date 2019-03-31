<?php
namespace App\Issuer;

use App\Issuer\Genitive;

class Promotion extends Genitive
{
    protected $table = "promotions_points";
    protected $fillable = [
      'type','point',
     ];
    public function promotion(){
        return $this->belongsTo('App\Issuer\Promotion')->first();
    }

}
