<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use Searchable;

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array = $this->transform($array);

        $array['client_name'] = $this->client->name;
        $array['system_name'] = $this->system->email;

        return $array;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'system_id', 'serial_number', 'activation_date', 'due_date', 'observations', 'status'
    ];

    /**
     * The roles that belong to the user.
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * The roles that belong to the user.
     */
    public function system()
    {
        return $this->belongsTo(System::class, 'system_id');
    }

    public function getGetDueDateAttribute()
    {
        return date('d/m/Y', strtotime($this->due_date));
    }

    public function getGetActivationDateAttribute()
    {
        return date('d/m/Y', strtotime($this->activation_date));
    }

    public function getGetImageAttribute()
    {
        $image = $this->system->image;

        if ($image) {
            return url("storage/$image");
        }
    }

    public function getGetActivationDateOtherAttribute()
    {
        return date('Y-m-d', strtotime($this->activation_date));
    }

    public function getGetDueDateOtherAttribute()
    {
        return date('Y-m-d', strtotime($this->due_date));
    }
}
