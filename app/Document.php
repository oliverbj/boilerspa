<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * Indicates if the model should be timestamoed
     * @var bool
     */

    public $timestamps = true;

    protected $fillable = [
        'booking_reference', 'shipment_reference', 'vgm_cutoff_date',
        'pickup_location', 'drop_off_location', 'comments', 'carrier',
        'user_id'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
