<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = ['added_by', 'user_id', 'role_id'];


    public function addedBy()
    {
        return $this->belongs(User::class, 'added_by');

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
