<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'files';

    public function hash()
    {
        //$hash = substr(sha1($this->name . microtime()), 0, 8);
    }
}
