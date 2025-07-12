<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventResource extends Model
{
    // soft delete
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $fillable = [
        'title', // name on the resources
        'description', // description
        'resource_format',
        'category',
        'url',
        'event_id',
        'created_by',
    ];

    // public function eventResourcesRoles()
    // {
    //     return $this->hasMany(EventResourcesRole::class);
    // }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'event_resource_role');
    }


    public function eventResourceRole()
    {
        return $this->belongsToMany(EventResourceRole::class, 'event_resource_role', 'event_resource_id', 'role_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // created by
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
