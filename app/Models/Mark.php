<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = ['user_id','assignment_id','mark'];
    // Defining our like connections to other tables in the db
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
