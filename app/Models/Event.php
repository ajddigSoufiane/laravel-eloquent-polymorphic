<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public $timestamps = false;

    protected $fillable = ['date'];

    /**
     * Returns a parent Content model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function content()
    {
        return $this->morphOne('App\Models\Content', 'content_data');
    }

}
