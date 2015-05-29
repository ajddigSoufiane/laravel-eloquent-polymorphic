<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

    public $timestamps = false;

    protected $fillable = ['title'];

    /**
     * Returns article or event data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function contentData()
    {
        return $this->morphTo('content_data');
    }

}
