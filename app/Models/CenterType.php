<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CenterType extends Model
{

    use SoftDeletes;

    protected $fillable = ['added_by','name', 'description'];


    public function addedBy()
    {
        return $this->belongs(User::class, 'added_by');

    }


    public function centers()
    {
        return $this->hasMany(Center::class, 'center_type_id');
    }    
}
