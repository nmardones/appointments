<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class appointment extends Model
{
    protected $guarded = [];

    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function getDatesssss($start_time,$date)
    {
        $sql ="select date,start_time from appointments where start_time ='$start_time' and date='$date'";
        return DB::select($sql);
    }

}
