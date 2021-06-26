<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\TypeRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Type as MainModel;
use App\Repositories\Interfaces\TypeNewsRepositoryInterface;
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
    protected $typeRepository;

    public function __construct(TypeNewsRepositoryInterface $typeRepository)
    {
        $this->typeRepository = $typeRepository;
        $this->viewAdmin = 'admin.' . $this->viewName;
        $this->viewAdminForm = 'admin.' . $this->viewName . '-form';
        $this->viewPage = 'page' . $this->viewName;
        $this->numPageAdmin = config('admin.num_page_admin');
    }

    public function index(Request $request)
    {
        $filter = $request->filter_status;
        $viewName = $this->viewName;
        $items = $this->typeRepository->getAll();
        $countAll = count($items);
        $countActive = count($items->where('status', '1'));
        $countInActive = count($items->where('status', '0'));
        // if ($filter == 'active') {
        //     $items = MainModel::whereIn('status', '1')->paginate($this->numPageAdmin);
        // }
        // if ($filter == 'inactive') {
        //     $items = MainModel::whereIn('status', '0')->paginate($this->numPageAdmin);
        // }
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
        $items = $this->typeRepository->create(
            [
                'name' => $request->name,
                'slug' => Str::of($request->name)->slug('-'),
                'order' => '1',
                'status' => $request->status,
                'category_id' => $request->category,
                'created_by' =>  Auth::user()->id,
            ]
        );
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
        $this->typeRepository->update($id, [
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-'),
            'status' => $request->status,
            'category_id' => $request->category,
            'updated_by' =>  Auth::user()->id,
        ]);
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
        try {
            $this->typeRepository->delete($id);
        } catch (\Throwable $error) {
            return back()->with('error', "Lỗi ! Không thể xóa");
        }
        return back()->with('success', 'Delete Succesfully');
    }

    public function changeStatus($id)
    {
        return $this->typeRepository->changeStatus($id);
    }

    public function getTypeofCategory($id)
    {
        $items = MainModel::where('category_id', $id)->get();

        return $items;
    }
}
