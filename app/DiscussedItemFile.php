<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussedItemFile extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'discussed_item_files';

    protected $fillable = [
    	'discussed_item_id',
		'path',
		'name',
		'file_extension'
    ];

    /**
     * Relations
     */
    public function discussedItem(){
    	return $this->belongsTo('App\DiscussedItem', 'discussed_item_id');
    }
}
