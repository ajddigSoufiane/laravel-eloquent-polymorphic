<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public $timestamps = false;

    protected $fillable = ['body'];

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
