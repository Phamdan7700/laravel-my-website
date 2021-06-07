<?php

namespace App\Repositories;

use App\Models\News;
use App\Repositories\Interfaces\TypeNewsRepositoryInterface;

class TypeNewsEloquentRepository  extends EloquentRepository implements TypeNewsRepositoryInterface {
    public function getModel() {
        return News::class;
    }
}
