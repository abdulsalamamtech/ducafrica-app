<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventResourceRole extends Model
{

    protected $table = 'event_resource_role';

    protected $fillable = [
        'event_resource_id',
        'role_id',
    ];

    public function eventResource()
    {
        return $this->belongsTo(EventResource::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
