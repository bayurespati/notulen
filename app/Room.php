<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rooms';

    protected $fillable = [
    	'project_id',
		'ms_room_id',
    ];

    /**
     * Relations
     */
    public function msRoom(){
    	return $this->belongsTo('App\MsRoom', 'ms_room_id');
    }

    public function project(){
    	return $this->belongsTo('App\Project', 'project_id');
    }

    public function roomFiles(){
    	return $this->hasMany('App\RoomFile', 'project_id');
    }
}
