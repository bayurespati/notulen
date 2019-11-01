<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsRoom extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ms_rooms';

    protected $fillable = [
    	'code',
    	'name'
    ];

    public function rooms(){
        return $this->hasMany('App\Room', 'ms_room_id');
    }
}
