<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BookingConfirmations extends Model
{
    use LogsActivity;

    /**
     * Indicates if the model should be timestamped
     * @var bool
     */

    public $timestamps = true;

    /**
     * Indicates if all the fillables attributes should be logged (Spatie activity logger)
     * @var bool
     */
    protected static $logFillable = true;

    /**
     * Specify $logName, which is the name of the log
     * @var bool
     */
    protected static $logName = 'bookingconfirmations';

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
