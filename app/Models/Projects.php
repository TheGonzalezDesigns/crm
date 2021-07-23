<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $guarded = [];

//    protected $table = 'projects';
//
//    protected $primaryKey = 'id';

    public function upcomings() {
        return $this->hasMany(Upcoming::class);
    }
}