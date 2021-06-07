<?php

namespace App\Repositories;

use App\Models\News;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostEloquentRepository extends EloquentRepository implements PostRepositoryInterface {
    public function getModel() {
        return News::class;
    }
}
