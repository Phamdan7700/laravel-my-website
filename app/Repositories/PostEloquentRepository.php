<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostEloquentRepository extends EloquentRepository implements PostRepositoryInterface
{
    public function getModel()
    {
        return Post::class;
    }

    public function delete($id)
    {
        $result = $this->model->findOrFail($id);
        if ($result) {
            foreach ($result->comments as $comment) {
                $comment->delete();
            }
            $result->delete();
            return true;
        }
        return false;
    }

    public function changeHightLight($id) {
        $item = $this->model->findOrFail($id);
        $hightlight = $item->hightlight;
        if ($hightlight == 1) {
            $item->hightlight = 0;           
        } else {
            $item->hightlight = 1;
            
        }
        $item->update(['hightlight'=> $item->hightlight]);
		return $item->hightlight;
    }
}
