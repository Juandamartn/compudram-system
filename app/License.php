<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
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

    public function getGetImageAttribute()
    {
        $image = $this->system->image;

        if ($image) {
            return url("storage/$image");
        }
    }
}
