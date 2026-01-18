<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{



    const STATUS_PENDING = 'pending';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_IN_TRANSIT = 'in_transit';
    const STATUS_DELIVERED = 'delivered';

    const ALLOWED_STATUSES = [self::STATUS_PENDING, self::STATUS_CANCELLED, self::STATUS_IN_TRANSIT, self::STATUS_DELIVERED];


    use HasFactory;
    protected $fillable = [
        'title',
        'from_city',
        'from_country',
        'to_city',
        'to_country',
        'price',
        'status',
        'user_id',
        'details',
    ];

    public function setStatusAttribute($status)
    {
        if (!in_array($status, self::ALLOWED_STATUSES)) {
            throw new Exception('Invalid status');
        }

        $this->attributes['status'] = $status;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
