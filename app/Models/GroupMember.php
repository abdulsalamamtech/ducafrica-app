<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    
    protected $fillable = ['group_id', 'user_id', 'added_by'];

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addedBy(){
        return $this->belongsTo(User::class, 'added_by');
    }
}
