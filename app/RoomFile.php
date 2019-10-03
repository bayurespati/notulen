<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomFile extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'room_files';

    protected $fillable = [
    	'room_id',
		'name',
		'path',
		'file_extension'
    ];

    /**
     * Relations
     */
    public function project(){
    	return $this->belongsTo('App\Project', 'project_id');
    }
}
