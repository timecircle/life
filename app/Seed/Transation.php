<?php
namespace App\Seed;

use App\Seed;

class Transaction extends Seed{
    protected $table    = "transactions";
    protected $fillable = ['interact_id','in','out'];
}
