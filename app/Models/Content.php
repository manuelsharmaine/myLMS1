<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    //   protected $table = 'tbl_name';


    protected $appends = ['thumbnail', 'date'];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function notes() {
        return $this->hasMany(Note::class);
    }

    public function getThumbnailAttribute() {

        return !empty($this->thumbnail) ? $this->thumbnail : 'https://w7.pngwing.com/pngs/817/902/png-transparent-google-logo-google-doodle-google-search-google-company-text-logo-thumbnail.png';
    }

    public function getDateAttribute() {
        
        return $this->created_at !== null ? Carbon::parse($this->created_at) : Carbon::now();
    }
}
