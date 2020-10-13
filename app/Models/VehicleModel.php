<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    //
    protected $table="vehicles";
    // public $timestamps = false;
    protected $fillable = [
        "name",
        "model",
        "rating",
        "fare",
        "created_at",
        "updated_at"
    ];
}
