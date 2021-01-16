<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public function users()
    {
        return $this->belongsTo("App\User", "user_id");
    }

    public function courses()
    {
        return $this->belongsTo("App\Course", "course_id");
    }
}
