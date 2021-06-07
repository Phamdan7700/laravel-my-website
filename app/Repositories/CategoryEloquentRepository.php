<?php

namespace App\Repositories;

use App\Models\News;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface {
    public function getModel() {
        return News::class;
    }
}
