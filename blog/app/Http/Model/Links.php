<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $table = 'links';
    public $timestamps = false;
    protected $guarded = [];//排除
}
