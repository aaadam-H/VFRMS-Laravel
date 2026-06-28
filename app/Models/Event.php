<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'eventName',
        'eventStartDate',
        'eventEndDate',
        'eventDesc',
        'status',
        'regStartDate',
        'regEndDate',
        'fee',
        'earlyFee',
        'contactNumEvent',
        'bankName',
        'accNumber',
        'earlyFeeQt',
        'eventImg',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_events', 'event_id', 'user_id');
    }
}
