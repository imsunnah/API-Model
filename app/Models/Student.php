<?php

namespace App\Models;

use App\Filters\StudentFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = StudentFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        
    ];


}
