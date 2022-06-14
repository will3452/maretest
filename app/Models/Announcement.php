<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'description',
        'date',
        'where'
    ];
    public function user()
    {
        return $this->belongsTo(Announcement::class, 'user_id');
    }
}
