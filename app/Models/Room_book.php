<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Room()
    {
        return $this->belongsTo(Room::class);
    }

    public function scopeRoomcall($query, $id)
    {
        return $query->where('room_id', '=', $id);
    }

    public function scopeActive($query)
    {
        return $query->where('active', '=', 1);
    }
}
