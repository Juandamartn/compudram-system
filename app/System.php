<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image'
    ];

    /**
     * The roles that belong to the user.
     */
    public function licenses()
    {
        return $this->hasMany(License::class, 'system_id');
    }

    public function getGetImageAttribute()
    {
        if ($this->image) {
            return url("storage/$this->image");
        }
    }
}
