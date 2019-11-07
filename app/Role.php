<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = ['id'];

    public function permissions()
    {
        return $this->belongsToMany(Permission_role::class, 'permission_role', 'role_id', 'permission_id');
    }
}
