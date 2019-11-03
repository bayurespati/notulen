<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsDescriptiveFinishing extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ms_descriptive_finishings';

    protected $fillable = [
    	'name',
    ];
}
