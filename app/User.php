<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'users';

    use Notifiable,HasApiTokens;

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

    /**
     * Relations
     *
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function company()
    {
        return $this->belongsTo('App\Companies', 'companies_id');
    }


    public function allUserJson()
    {
        $data = User::with(['company'])->get();

        $users = $data->map(function ($user){
            $dataUser = $this->prepareJSON($user);
            return $dataUser;
        });

        return $users;
    }

    public function prepareJSON($user)
    {
        $dataUser = [
            'secondary_contact' => $user->secondary_contact,
            'current_position' => $user->current_position,
            'primary_contact' => $user->primary_contact,
            'companyName' => $user['company']['name'],
            'companyId' => $user['company']['id'],
            'isActive' => $user->is_active === 1 || $user->is_active === true ? true : false,
            'address' => $user->address,
            'email' => $user->email,
            'name' => $user->name,
            'id' => $user->id,
        ];

        return $dataUser;
    }

    public function hasRole($role)
    {
        // if $role is string
        if (is_string($role)) {
            return $this->role->name == str_slug($role);
        }

        // if $role is collection
        foreach ($role as $r) {
            if ($this->hasRole($r->label)) {
                return true;
            }
        }

        return false;
    }
}
