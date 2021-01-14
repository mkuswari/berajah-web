<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function categories()
    {
        return $this->belongsTo("App\Category", "category_id");
    }

    public function instructors()
    {
        return $this->belongsTo("App\Instructor", "instructor_id");
    }
}
