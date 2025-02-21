<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    use HasFactory;

    protected $table = 'user_event';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'event_id',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
