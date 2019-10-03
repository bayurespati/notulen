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
}
