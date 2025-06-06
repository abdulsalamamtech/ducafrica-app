<?php

namespace App\Models;

use App\Models\CenterAsset;
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

    public function centerAsset()
    {
        return $this->hasOne(CenterAsset::class, 'center_id');
    }

    public function transactions()
    {
        $transaction = Transaction::where('payment_status', 'success')
            ->whereIn('booked_event_id',  $this?->events?->pluck('id'));
        // return dd($transaction->toRawSql());
        return $transaction?->get();
    }


    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
