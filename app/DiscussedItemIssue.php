<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussedItemIssue extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'discussed_item_issues';

    protected $fillable = [
    	'discussed_item_id',
		'title',
		'details',
		'solution'
    ];

    /**
     * Relations
     */
    public function discussedItem(){
    	return $this->belongsTo('App\DiscussedItem', 'discussed_item_id');
    }
}
