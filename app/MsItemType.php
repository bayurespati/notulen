<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsItemType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ms_item_types';

    protected $fillable = [
    	'code',
    	'name'
    ];

    /**
     * Relations
     */
    public function msItems(){
        return $this->hasMany('App\MsItem', 'ms_item_type_id');
    }
}
