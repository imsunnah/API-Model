<?php
// Note: This is a test model file
namespace App\Models;

use App\Filters\CustomerFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    use HasFactory, Filterable;

    protected string $default_filters = CustomerFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
		'age',
		'gender',
    ];


}
