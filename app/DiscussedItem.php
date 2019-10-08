<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussedItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'discussed_items';

    protected $fillable = [
    	'item_id',
    	'meeting_id',
    	'qty',
    	'diameter',
    	'dimension',
    	'width',
    	'height',
    	'general_note',
    ];

    protected $hidden = [
    	'created_at', 'updated_at',
    ];

    /**
     * Relations
     */
    public function meeting(){
    	return $this->belongsTo('App\Meeting', 'meeting_id');
    }

	public function item(){
    	return $this->belongsTo('App\Item', 'item_id');
    }

    public function files(){
    	return $this->hasMany('App\DiscussedItemFile', 'discussed_item_id');
    }
}
