<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['added_by', 'name', 'description'];


    public function users()
    {
        return $this->belongsToMany(User::class, 'group_members', 'group_id');
    }
}