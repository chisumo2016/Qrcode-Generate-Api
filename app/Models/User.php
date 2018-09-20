<?php

namespace App\Models;

use App\HasRole;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * @SWG\Definition(
 *      definition="User",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="role_id",
 *          description="role_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="password",
 *          description="password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="remember_token",
 *          description="remember_token",
 *          type="string"
 *      )
 * )
 */
class User extends Model
{
    use SoftDeletes, HasApiTokens, Notifiable, HasRole;


    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'role_id',
        'email',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'role_id' => 'integer',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * Get the transactions   for the user.
     */
    public function trasanctions()
    {
        return $this->hasMany('App\Models\Trasanction');
    }

    /**
     * Get the role that owns this users.   User can have one role
     */
//    public function role()
 //   {
  //      return $this->belongsTo('App\Models\Role');
  //  }

    /**
     * Get the transactions   for the user.
     */
    public function qrcodes()
    {
        return $this->hasMany('App\Models\Qrcode');
    }

    public function account_histories()
    {
        return $this->hasMany('App\Models\AccountHistory');
    }


    /**
     * Get the account record associated with the user.
     */
    public function account()
    {
        return $this->hasOne('App\Account');
    }

    
}
