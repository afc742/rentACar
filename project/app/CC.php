<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cc extends Model
{
    // Table Name
    protected $table = 'cc';
    // Primary Key
    public $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
