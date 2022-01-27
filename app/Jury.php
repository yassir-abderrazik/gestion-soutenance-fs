<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jury extends Model
{

    protected $fillable = [ 'student_id', 'presidentName', 'examinerName',
    'guestName', 'presidentUniversity', 'examinerUniversity', 'guestUniversity', 'dateDefense',
   ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
