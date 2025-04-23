<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['added_by', 'group_head_id', 'name', 'description'];


    public function users()
    {
        return $this->belongsToMany(User::class, 'group_members', 'group_id');
    }

    public function groupHead(){
        return $this->belongsTo(User::class, 'added_by');
    }

    // public function groupHead(){
    //     return $this->belongsTo(User::class, 'group_head_id');
    // }

    // Group members
    public function groupMember()
    {
        return $this->hasMany(GroupMember::class, 'group_id');
    }  
}
