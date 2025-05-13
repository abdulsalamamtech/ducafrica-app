<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CenterGroup extends Model
{
    protected $fillable = [
        'center_id',
        'group_id',
    ];


    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }
}
