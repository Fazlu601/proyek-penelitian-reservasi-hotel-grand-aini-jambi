<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Facility()
    {
        return $this->hasMany(Facility::class);
    }

    public function Room_image()
    {
        return $this->hasMany(Room_image::class);
    }

    public function Room_book()
    {
        return $this->hasMany(Room_book::class);
    }
}
