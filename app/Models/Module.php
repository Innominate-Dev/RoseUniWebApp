<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name','module_level'];
    //
    public function awards()
    {
        return $this->belongsToMany(Award::class, 'award_modules');
    }
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
