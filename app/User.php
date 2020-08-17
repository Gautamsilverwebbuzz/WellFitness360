<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','auth_provider','name','sur_name','gender','email','password','contact_no','profile_image','social_profile_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get Data
     */
    public function getData($roleId = null){
        $User = new static;
        if($roleId){
            $data = $User->where('role_id',$roleId)->get();
            if($data){
                return $data->toArray();
            }else{
                return false;
            }
        }
    }

     // Relationship one to one in admin Fees management
    public function Fees()
    {
        return $this->belongsTo('App\Http\Models\FeesManagement', 'TrainerID','id');
    }

    public function TrainerAvailability()
    {
        return $this->hasMany('App\Http\Models\frontend\TrainerAvailability', 'trainer_id','id');
    }
}
