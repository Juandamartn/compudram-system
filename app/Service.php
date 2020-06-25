<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'owner', 'brand_pc', 'description', 'accesories', 'receipt_date', 'delivery_date', 'charge', 'status'
    ];

    public function getGetReceiptDateAttribute()
    {
        return date('d/m/Y', strtotime($this->receipt_date));
    }

    public function getGetNameAttribute()
    {
        return substr($this->name, 0, 20);
    }

    public function getGetDeliveryDateAttribute()
    {
        return date('d/m/Y', strtotime($this->delivery_date));
    }

    public function getGetReceiptDateOtherAttribute()
    {
        return date('Y-m-d', strtotime($this->receipt_date));
    }

    public function getGetDeliveryDateOtherAttribute()
    {
        return date('Y-m-d', strtotime($this->delivery_date));
    }

    public function setOwnerAttribute($value)
    {
        $this->attributes['owner'] = strtolower($value);
    }

    public function setBrandPcAttribute($value)
    {
        $this->attributes['brand_pc'] = strtolower($value);
    }

    public function setChargeAttribute($value)
    {
        $this->attributes['charge'] = (int) $value;
    }
}
