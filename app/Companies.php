<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

    protected $fillable = [
    	'name',
		'city',
		'address',
		'email',
		'primary_contact',
		'secondary_contact',
    ];

    protected $hidden = [
    	'created_at', 'updated_at',
    ];

    /**
     * Relations
     */
    public function users(){
    	return $this->hasMany('App\User','companies_id');
    }
}
