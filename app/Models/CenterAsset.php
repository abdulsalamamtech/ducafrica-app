<?php

namespace App\Models;


use App\Models\Center;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CenterAsset extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'center_id',
        'original_name',
        'name',
        'type',
        'path',
        'file_id',
        'url',
        'size',
        'hosted_at',
        'active',
    ];


    public function center()
    {
        return $this->belongsTo(Center::class, 'center_id');
    }
}
