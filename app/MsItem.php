<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ms_items';

    protected $fillable = [
    	'ms_item_type_id',
    	'code',
    	'name',
    	'alternative_name'
    ];

    protected $hidden = [
    	'created_at', 'updated_at',
    ];

    /**
     * Relations
     */
    public function msItemType(){
    	return $this->belongsTo('App\MsItemType', 'ms_item_type_id');
    }

    public function msItemDetails(){
        return $this->belongToMany('App\MsItem', 'ms_item_detail', 'ms_item_id', 'ms_item_detial_id');
    }

    public function items(){
        return $this->hasMany('App\Item', 'ms_item_id');
    }
}
