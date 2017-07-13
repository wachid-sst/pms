<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * 10 July 2017
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model {
    //public $timestamps = false;
    protected $fillable = ['unique_id','name','email','encrypted_password','salt'];
    protected $table = "pms_users";
}