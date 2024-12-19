<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Center extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'added_by',
        'center_type_id',
        'belongs_to_user',
        'name',
        'payment_id',
        'phone_number',
        'type',
        'address',
        'map_url',
        'state'
    ];


    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function belongsToUser()
    {
        return $this->belongsTo(User::class, 'belongs_to_user', 'id');
    }

    public function centerType()
    {
        return $this->belongsTo(CenterType::class, 'center_type_id');
    }


    public function events()
    {
        return $this->hasMany(Event::class, 'center_id');
    }



}
