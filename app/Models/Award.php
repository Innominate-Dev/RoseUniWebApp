<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{   
    protected $fillable = ['name'];

    // Defining our like connections to other tables in the db
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'award_modules');
    }
}
