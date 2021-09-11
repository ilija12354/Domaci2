<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopingList extends Model
{
    protected $table = 'shoping_list';
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
}
