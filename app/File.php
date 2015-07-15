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

    /**
     * Create hash
     *
     * @return string $hash
     */
    public static function hash()
    {
        return substr(bin2hex(openssl_random_pseudo_bytes(8)), 0, 8);
    }
}
