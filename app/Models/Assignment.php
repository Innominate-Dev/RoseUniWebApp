<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['module_id','name','weighting','max_marks'];
    // Defining our like connections to other tables in the db
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}
