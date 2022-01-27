<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [ 'user_id', 'firstname', 'lastname',
    'CIN', 'CNE', 'birthday', 'city', 'email',
    'phone', 'address', 'faculty', 'specialty',
    'supervisor_id', 'project', 'summary'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function supervisor(){
        return $this->belongsTo(Supervisor::class);
    }
    public function jury()
    {
        return $this->hasOne(Jury::class);
    }

}
