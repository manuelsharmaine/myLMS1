<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    // protected $table = 'tbl_name'; //optional if table name is not the plural form of your model
    // protected $primaryKey = "fld_id"; //optional if primary key is not id

    //mass assignment
    protected $fillable = ['name', 'description', 'is_draft', 'is_free'];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

}
