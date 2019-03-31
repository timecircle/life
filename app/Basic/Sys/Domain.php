<?php
namespace App\Basic\Sys;

use App\Basic\Sys\Access;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Domain extends Model
{
    protected $table = 'domains';
    public $timestamps  = false;
    protected $fillable = ['name','secret','user_id'];
    public $is;

    public function store()
    {
        DB::beginTransaction();

         try {
           if($this->id){
              $this->fill($this->is)->save();
           }
           else {

             $this->newer();

           }
         }
         catch (Exception $e) {
             DB::rollBack();
             throw new Exception($e->getMessage());
         }
    }

    public static function exits( $domain )
    {
        $dm = Domain::where('name', $domain )->first();
        return $dm ? true : false;
    }
    public static  function accesss()
    {
        return $this->hasMany('App\Basic\Sys\Access')->get();
    }
    public function user()
    {
        return $this->belongsTo('App\Basic\Sys\User')->first();
    }

    function newer()
    {
        $u            = new User;
        $u->password  = bcrypt($this->is['password']);
        $u->public    = $this->is['public'];
        $u->save();

        if($u->id){
           $this->is['user_id']  =  $u->id;
           $this->is['secret']   =  bcrypt( str_random(12));

           $this->fill($this->is)->save();

           if($this->id)
           {
               $access = new Access;
               $access->domain_id  = $this->id;
               $access->user_id    = $u->id;
               $access->save();
           }
        }
    }
}
