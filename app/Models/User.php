<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enum\UserRoleEnum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;


class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;
    // use HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'title',
        'first_name',
        'last_name',
        'other_name',
        'email',
        'phone',
        'phone_type',
        'dob',
        'city',
        'state',
        'country',
        'address', 'nok',
        'nok_relationship',
        'nok_phone',
        'food_allergies',
        'diets',
        'center_id',
        'other_disability',
        'role',
        'password_clue',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime:l, jS F Y',
            'password' => 'hashed',
            'dob' => 'datetime:l, jS F Y',
            'role' => UserRoleEnum::class,
            'created_at' => 'datetime:l, jS F Y',
            'updated_at' => 'datetime:l, jS F Y',
            'deleted_at' => 'datetime:l, jS F Y',
        ];
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function bookedEvents()
    {
        return $this->hasMany(BookedEvent::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function activeRole(){
        $active_role = $this->roles->first()->name ?? 'user';
        return $active_role;
    }

    public function statistics(){
        // $user = auth()->user();
        $user = $this;
        // dd($user->id);
        $statistics = [
            'admin' => [
                'users' => [
                    'total' => User::count(),
                    'new_users' => User::where('status', 'pending')->orWhereNull('email_verified_at')->count(),
                    'verified' => User::whereNotNull('email_verified_at')->count(),
                    'unverified' => User::whereNot('email_verified_at')->count(),
                    'pending' => User::orWhere('status', 'pending')->orWhereNull('email_verified_at')->count(),
                    'active' => User::where('status', 'active')->count(),
                ],
                'roles' => [
                    'admins' => User::where('role', 'admin')->count(),
                    'users' => User::where('role', 'user')->count(),
                ],
                'centers' => Center::count(),
                'inactive_centers' => Center::whereNull('status')->count(),
                'events' => Event::count(),
                'booked_events' => BookedEvent::count(),
                'cancel_events' => CancelEvent::count(),
                'installments' => UserInstallment::count(),
                'installment_amount' =>UserInstallment::sum('amount'),
                'installment_transactions' => UserInstallmentPayment::count(),
                'installment_requests'=>UserInstallment::whereNull('approved_by')->orWhere('approved', false)->count(),
                'transactions' => [
                    'total' => Transaction::count(),
                    'amount' => Transaction::sum('amount'),
                    'success_amount' => Transaction::where('payment_status', 'success')->sum('amount'),
                    'success_total' => Transaction::where('payment_status', 'success')->count(),
                    'pending_amount' => Transaction::where('payment_status', 'pending')->sum('amount'),
                    'pending_total' => Transaction::where('payment_status', 'pending')->count(),
                ],
                'event_resources' => [
                    'total' => EventResource::count(),
                    'active' => EventResource::where('status', 1)->count(),
                    'inactive' => EventResource::where('status', 0)->count(),
                    'general' => EventResource::where('category', 'general')->count(),
                ]
            ],
            'user' => [
                'booked_events' => BookedEvent::where('user_id', $user->id)->count(),
                'cancel_events' => CancelEvent::where('user_id', $user->id)->count(),
                'installments' => UserInstallment::where('user_id', $user->id)->count(),
                'installment_amount' => UserInstallment::where('user_id', $user->id)->sum('amount'),
                'installment_transactions' => UserInstallmentPayment::where('user_id', $user->id)->count(),
                'transactions' => [
                    'total' => Transaction::where('user_id', $user->id)->count(),
                    'amount' => Transaction::where('user_id', $user->id)->sum('amount'),
                    'success_amount' => Transaction::where('user_id', $user->id)->where('payment_status', 'success')->sum('amount'),
                    'success_total' => Transaction::where('user_id', $user->id)->where('payment_status', 'success')->count(),
                    'pending_amount' => Transaction::where('user_id', $user->id)->where('payment_status', 'pending')->sum('amount'),
                    'pending_total' => Transaction::where('user_id', $user->id)->where('payment_status', 'pending')->count(),
                ]
            ]
        ];
        return $statistics;
    }


    // Get User Group
    // belongs to many through
    // users [id, name]
    // groups [id, name]
    // group_members [id, group_id, user_id]
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_members', 'user_id', 'group_id');
    }


    
}
