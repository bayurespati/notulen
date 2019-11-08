<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'companies_id',
        'name', 
        'email', 
        'password', 
        'address', 
        'current_position', 
        'primary_contact', 
        'secondary_contact', 
        'is_active',
        'account_approved_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function allUserJson()
    {
        $data = User::with(['company'])->get();
        

        $users = $data->map(function ($user){

            $dataUser = [
                'id' => $user->id,
                'name' => $user->name,
                'company' => $user['company'],
                'email' => $user->email,
                'address' => $user->address,
                'current_position' => $user->current_position,
                'primary_contact' => $user->primary_contact,
                'secondary_contact' => $user->secondary_contact,
                'isActive' => $user->is_active === 1 ? true : false,
            ];

            return $dataUser;
        });

        return $users;
    }

    /**
     * Relations
     */
    public function company(){
        return $this->belongsTo('App\Companies', 'companies_id');
    }
}
