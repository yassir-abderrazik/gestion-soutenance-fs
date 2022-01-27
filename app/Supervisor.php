<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $fillable = [ 'user_id', 'name', 'university',
    'department', 'email'
   ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
