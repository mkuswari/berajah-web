<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function courses()
    {
        return $this->belongsTo("App\Course", "course_id");
    }
}
