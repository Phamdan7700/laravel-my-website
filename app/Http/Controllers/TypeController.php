<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\TypeRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Type as MainModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $viewName = 'type';
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
            $items = MainModel::whereIn('status', '1')->paginate($this->numPageAdmin);
        }
        if ($filter == 'inactive') {
            $items = MainModel::whereIn('status', '0')->paginate($this->numPageAdmin);
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
        $categories = Category::all();
        return view($this->viewAdminForm, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $items = MainModel::create([
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-'),
            'order' => '1',
            'status' => $request->status,
            'category_id' => $request->category,
            'created_by' =>  Auth::user()->id,
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
        $type = MainModel::findOrFail($id);
        $posts = Post::where('type_id', $id)->paginate(5);
        return view('page.type', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $item = MainModel::findOrFail($id);
        return view($this->viewAdminForm, compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5|max:255',
            'status' => 'required',
        ]);
        $item = MainModel::findOrFail($id);
        $item->name = $request->name;
        $item->slug = Str::of($request->name)->slug('-');
        $item->status = $request->status;
        $item->category_id = $request->category;
        $item->updated_by =  Auth::user()->id;
        $item->save();
        return redirect()->route('admin.type.index')->with('success', 'Update succesfully!');
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
            $item->delete();
        } catch (\Throwable $error) {
            return back()->with('error', "Lỗi ! Không thể xóa");
        }
        return back()->with('success', 'Delete Succesfully');
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

    public function getTypeofCategory($id)
    {
        $items = MainModel::where('category_id', $id)->get();
        
        return $items;
    }
}
