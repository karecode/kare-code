<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $fillable=['baslik','icerik','user_id','kucuk_resim','orta_resim','buyuk_resim','slug'];

    protected $dates=['deleted_at'];
}
