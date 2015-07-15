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
     * Create hash.
     *
     * Create a new hash for a newly uploaded file. This function is recursive
     * if it creates a hash that is currently in use. Although it's pretty
     * difficult to create an exact same hash, it can happen.
     *
     * @return string $hash
     */
    public static function hash()
    {
        $hash = substr(bin2hex(openssl_random_pseudo_bytes(8)), 0, 8);
        if (is_null(self::where('hash', '=', $hash)->first())) {
            return $hash;
        } else return self::hash();
    }
}
