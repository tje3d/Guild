<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Question extends Model implements Sortable
{
    use SortableTrait;

    protected $guarded = [];
    protected $casts   = [
        'data' => 'collection'
    ];
}
