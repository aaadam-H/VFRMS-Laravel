<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'eventID';

    protected $fillable = [
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
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
