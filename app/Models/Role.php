<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{

    use SoftDeletes;

    protected $fillable = ['added_by','name', 'description'];


    public function addedBy()
    {
        return $this->belongs(User::class, 'added_by');

    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }



}
