<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventType extends Model
{
    use SoftDeletes;

    protected $fillable = ['added_by', 'event_type_id','name', 'description'];


    public function addedBy()
    {
        return $this->belongs(User::class, 'added_by');

    }


    public function events()
    {
        return $this->hasMany(Event::class, 'event_type_id');
    }   
}
