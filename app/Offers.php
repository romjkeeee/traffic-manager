<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $guarded = ['id'];

    public function countries()
    {
        return $this->belongsTo(Countries::class, 'countries_id');
    }

    public function applications()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
