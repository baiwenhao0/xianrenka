<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //允许这个content字段更新，否则会报错：Class App\Http\Controllers\StatusesController does not exist

    protected $fillable = ['content'];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
