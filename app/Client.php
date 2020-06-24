<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'address', 'rfc'
    ];

    /**
     * The roles that belong to the user.
     */
    public function licenses()
    {
        return $this->hasMany(License::class, 'client_id');
    }

    public function getGetCreationDateAttribute()
    {
        return date('d/m/Y', strtotime($this->created_at));
    }

    public function getGetUpdatedDateAttribute()
    {
        return date('d/m/Y', strtotime($this->updated_at));
    }

    public function setPhoneAttribute($value) {
        $this->attributes['phone'] = (int)$value;
    }

    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = strtolower($value);
    }

    public function setRfcAttribute($value) {
        $this->attributes['rfc'] = strtolower($value);
    }

    public function setAddressAttribute($value) {
        $this->attributes['address'] = strtolower($value);
    }
}
