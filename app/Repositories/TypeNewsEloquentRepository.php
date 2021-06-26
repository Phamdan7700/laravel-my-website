<?php

namespace App\Repositories;

use App\Models\Type;
use App\Repositories\Interfaces\TypeNewsRepositoryInterface;

class TypeNewsEloquentRepository  extends EloquentRepository implements TypeNewsRepositoryInterface {
    public function getModel() {
        return Type::class;
    }
}
