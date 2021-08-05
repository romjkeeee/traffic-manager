<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = ['id'];


    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'organisation_id');
    }
}
