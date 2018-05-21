<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    // Table Name
    protected $table = 'bank';
    // Primary Key
    public $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
