<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsItemDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ms_item_details';

    protected $fillable = [
    	'name',
    ];

    protected $hidden = [
    	'created_at', 'updated_at',
    ];

    /**
     * Relations
     */
    public function msItems(){
    	return $this->belongToMany('App\MsItem', 'ms_item_detail', 'ms_item_detial_id', 'ms_item_id');
    }
}
