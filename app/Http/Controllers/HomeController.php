<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $viewName = 'post';
    protected $viewAdminPath;

    public function __construct()
    {
        $this->viewAdminPath = config('admin.view_path_admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsHightlight  = Post::where('hightlight', 1)->orderByDesc('created_at')->get();
        $postInWeek = Post::whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->get();

        return view('page.index', compact( 'postsHightlight', 'postInWeek'));
    }

    
}
