<?php

namespace App;

use Hash;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'key'];

    /**
     * Generate a new key for the user.
     *
     * Format: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxx
     *
     * @return string $key
     */
    public function generateNewKey()
    {
        $key = substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 32);

        $key[8]  = '-';
        $key[13] = '-';
        $key[18] = '-';
        $key[23] = '-';

        // Save the key in our database. We want to hash the key because we 
        // don't want anyone to be able to figure out what someone's key is. 
        // Once the key is generated it'll never be known again except to the 
        // user of the key.

        $this->key = Hash::make($key);
        $this->save();

        return $key;
    }

    /**
     * Validate Key
     *
     * Checks to see if the key given matches the key stored.
     *
     * @return bool
     */
    public function validateKey($key)
    {
        return Hash::check($key, $this->key);
    }
}
