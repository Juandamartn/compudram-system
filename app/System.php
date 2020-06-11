<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    /**
     * The roles that belong to the user.
     */
    public function licenses()
    {
        return $this->hasMany(License::class, 'system_id');
    }
}
