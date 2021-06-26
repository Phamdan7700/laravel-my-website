<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post as MainModel;
use App\Models\Type;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected $viewName = 'post';
    protected $viewAdmin;
    protected $viewAdminForm;
    protected $viewPage;
    protected $numPageAdmin;
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->viewAdmin = 'admin.' . $this->viewName;
        $this->viewAdminForm = 'admin.' . $this->viewName . '-form';
        $this->viewPage = 'page' . $this->viewName;
        $this->numPageAdmin = config('admin.num_page_admin');
    }

    public function index(Request $request)
    {
        $viewName = $this->viewName;
        $items = $this->postRepository->getAll();
        $countAll = count($items);
        $countActive = count($items->where('status', '1'));
        $countInActive = count($items->where('status', '0'));

        return view(
            $this->viewAdmin,
            compact(['items', 'viewName', 'countAll', 'countActive', 'countInActive'])
        );
    }


    public function create()
    {
        $types = Type::all();
        return view($this->viewAdminForm, compact('types'));
    }


    public function store(PostRequest $request)
    {
        $items = $this->postRepository->create(
            [
                'title' => $request->title,
                'slug' => Str::of($request->title)->slug('-'),
                'summary' => $request->summary,
                'thumbnail' => $request->thumbnail,
                'content' => $request->content,
                'hightlight' => $request->hightlight,
                'status' => $request->status,
                'created_by' => Auth::user()->id,
                'type_id' => $request->type,
            ]
        );

        $items->save();
        return back()->with('success', 'Thêm thành công !!!');
    }


    public function show($id)
    {
        $singlePost = $this->postRepository->find($id);
        return view('page.post', compact('singlePost'));
    }


    public function edit($id)
    {
        $types = Type::all();
        $item = MainModel::findOrFail($id);
        $item->increment('view');
        return view($this->viewAdminForm, compact('item', 'types'));
    }


    public function update(PostRequest $request, $id)
    {

        $this->postRepository->update($id, [
            'title' => $request->title,
            'slug' => Str::of($request->title)->slug('-'),
            'summary' => $request->summary,
            'thumbnail' => $request->thumbnail,
            'content' => $request->content,
            'hightlight' => $request->hightlight,
            'status' => $request->status,
            'updated_by' => Auth::user()->id,
            'type_id' => $request->type,
        ]);

        return redirect()->route('admin.post.index')->with('success', 'Update succesfully!');
    }


    public function destroy($id)
    {
        try {
            $this->postRepository->delete($id);
        } catch (\Throwable $error) {
            return back()->with('error', "Lỗi ! Không thể xóa");
        }
        return back()->with('success', 'Delete Succesfully');
    }

    public function changeHightlight($id)
    {
        return $this->postRepository->changeHightlight($id);
    }

    public function changeStatus($id)
    {
        return $this->postRepository->changeStatus($id);
    }
}
