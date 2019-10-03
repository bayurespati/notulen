<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    protected $fillable = [
    	'code',
		'name',
		'address'
    ];

    /**
     * Relations
     */
    public function rooms(){
        return $this->hasMany('App\Room', 'project_id');
    }

    public function meetings(){
        return $this->hasMany('App\Meeting', 'project_id');
    }
}
