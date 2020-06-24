<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
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
}
