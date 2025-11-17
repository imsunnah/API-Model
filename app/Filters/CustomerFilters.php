<?php
// Note: This is a test filter file
namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class CustomerFilters extends QueryFilters
{
    protected array $allowedFilters = ['id', 'name', 'age', 'gender'];

    protected array $columnSearch = [];
}
