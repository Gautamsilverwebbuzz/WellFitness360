<?php

namespace App\Http\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class TrainerPrice extends Model
{
    protected $table = 'trainer_price_management';
    protected $primaryKey = 'id';


    public function trainer_categories(){
    	return $this->hasOne('App\Http\Models\TrainerCategories','trainer_cat_id','skils');
    }
}
