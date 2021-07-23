<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upcoming extends Model
{
    use HasFactory;
    protected $guarded = [];

//    protected $table = 'upcomings';
//
//    protected $primaryKey = 'id';

    public function projects() {
        return $this->belongsTo(Upcoming::class);
    }
}
