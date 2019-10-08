<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

    protected $fillable = [
    	'ms_item_id',
    	'project_id'
    ];

    protected $hidden = [
    	'created_at', 'updated_at',
    ];

    /**
     * Relations
     */
    public function msItem(){
    	return $this->belongsTo('App\MsItem', 'ms_item_id');
    }

    public function project(){
    	return $this->belongsTo('App\Project', 'project_id');
    }

    public function discussedItems(){
        return $this->hasMany('App\DiscussedItems', 'item_id');
    }
}
