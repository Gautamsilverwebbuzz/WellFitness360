<?php

namespace App\Http\Models\frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainerAvailability extends Model
{
	use SoftDeletes;
    protected $table = 'trainer_availability';
    protected $primaryKey = 'id';


    public function users()
    {
        return $this->belongsTo('App\User', 'id','trainer_id');
    }
}
