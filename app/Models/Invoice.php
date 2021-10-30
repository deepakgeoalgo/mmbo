<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'service',
        'price',
    ];

    public function getUser(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
