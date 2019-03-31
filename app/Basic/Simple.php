<?php
namespace App\Basic;

use App\Basic\Cell;
use App\Basic\Sys\User;

class Simple extends Cell
{
    public function user(){
        return  $this->belongsTo('App\Basic\Sys\User')->first();
    }

    public function store(){
      DB::beginTransaction();
       try {
         if($this->id)
         {
            $this->fill($this->is)->save();
         }
         else{
            $this->newer();
         }
       }catch (Exception $e) {
           DB::rollBack();
           throw new Exception($e->getMessage());
       }
    }

    function newer()
    {
        $u            = new User;
        $u->password  = bcrypt($this->is['password']);
        $u->public    = $this->is['public'];
        $u->save();
        if($u->id){
           $this->is['user_id']  = $u->id;
           $this->fill($this->is)->save();
        }
    }
}
