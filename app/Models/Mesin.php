<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * 10 July 2017
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesin extends Model {
    //public $timestamps = false;
    protected $fillable = ['mesin_name','mesin_ip'];
    protected $table = "mesin";
}