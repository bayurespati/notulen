<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'meetings';

    protected $fillable = [
    	'title',
		'planned_date',
		'actual_date',
		'general_note',
		'project_id',
    ];

    /**
     * Relations
     */
    public function project(){
    	return $this->belongsTo('App\Project','project_id');
    }
}
