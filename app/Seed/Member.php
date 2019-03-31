<?php
namespace App\Seed;

use App\Seed;

class Member extends Seed
{
    protected $table     = "members";
    protected $fillable  = [
      'code','name','redeem','accumulate',
      'card_id','email','phone','status'];

    public function card(){
        return $this->belongsTo('App\Issuer\Card')->first();
    }

}
