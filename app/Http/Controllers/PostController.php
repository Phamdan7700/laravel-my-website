<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\StoreRequest;
use App\Models\Category;
use App\Models\Post as MainModel;
use App\Models\Type;
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

    public function __construct()
    {
        $this->viewAdmin = 'admin.' . $this->viewName;
        $this->viewAdminForm = 'admin.' . $this->viewName . '-form';
        $this->viewPage = 'page' . $this->viewName;
        $this->numPageAdmin = config('admin.num_page_admin');
    }

    public function index(Request $request)
    {
        $filter = $request->filter_status;
        $viewName = $this->viewName;
        $items = MainModel::paginate($this->numPageAdmin);
        $countAll = count($items);
        $countActive = count($items->where('status', '1'));
        $countInActive = count($items->where('status', '0'));
        if ($filter == 'active') {
            $items = $items->where('status', '1');
        }
        if ($filter == 'inactive') {
            $items = $items->where('status', '0');
        }
        return view(
            $this->viewAdmin,
            compact(['items', 'viewName', 'countAll', 'countActive', 'countInActive'])
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view($this->viewAdminForm, compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $items = MainModel::create([
            'title' => $request->title,
            'slug' => Str::of($request->title)->slug('-'),
            'summary' => $request->summary,
            'thumbnail' => $request->thumbnail,
            'content' => $request->content,
            'hightlight' => $request->hightlight,
            'status' => $request->status,
            'created_by' => Auth::user()->id,
            'type_id' => $request->type,
        ]);

        $items->save();
        return back()->with('success', 'Thêm thành công !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singlePost = MainModel::findOrFail($id);
        return view('page.post', compact('singlePost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();
        $item = MainModel::findOrFail($id);
        return view($this->viewAdminForm, compact('item', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        
        $item = MainModel::findOrFail($id);
        $item->title = $request->title;
        $item->slug = Str::of($request->title)->slug('-');
        $item->summary = $request->summary;
        $item->thumbnail = $request->thumbnail;
        $item->content = $request->content;
        $item->hightlight = $request->hightlight;
        $item->status = $request->status;
        $item->updated_by = Auth::user()->id;
        $item->type_id = $request->type;
        $item->save();
        return redirect()->route('admin.post.index')->with('success', 'Update succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = MainModel::find($id);
        try {
            foreach ($item->comments as $comment) {
                $comment->delete();
            }

            $item->delete();
        } catch (\Throwable $error) {
            return back()->with('error', "Lỗi ! Không thể xóa");
        }
        return back()->with('success', 'Delete Succesfully');
    }

    public function changeHightlight(Request $request, $id)
    {
        $item = MainModel::findOrFail($id);
        $result = 0;
        $hightlight = $item->hightlight;
        if ($hightlight == 1) {
            $item->hightlight = 0;
            $result = 1;
        } else {
            $item->hightlight = 1;
            $result = 0;
        }
        $item->save();
        return $result;
    }

    public function changeStatus(Request $request, $id)
    {
        $item = MainModel::findOrFail($id);
        $result = 0;
        $status = $item->status;
        if ($status == 1) {
            $item->status = 0;
            $result = 0;
        } else {
            $item->status = 1;
            $result = 1;
        }
        $item->save();
        return $result;
    }
}
