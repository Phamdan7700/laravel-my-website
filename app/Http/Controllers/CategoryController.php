<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category as MainModel;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected $viewName = 'category';
    protected $viewAdmin;
    protected $viewAdminForm;
    protected $viewPage;
    protected $numPageAdmin;
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->viewAdmin = 'admin.' . $this->viewName;
        $this->viewAdminForm = 'admin.' . $this->viewName . '-form';
        $this->viewPage = 'page' . $this->viewName;
        $this->numPageAdmin = config('admin.num_page_admin');
    }

    public function index(Request $request)
    {
        $viewName = $this->viewName;
        $items = $this->categoryRepository->getAll();
        $countAll = count($items);
        $countActive = count($items->where('status', '1'));
        $countInActive = count($items->where('status', '0'));

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
        return view($this->viewAdminForm);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        $items = $this->categoryRepository->create(
            [
                'name' => $request->name,
                'slug' => Str::of($request->name)->slug('-'),
                'order' => '1',
                'status' => $request->status,
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
        $items = $this->categoryRepository->find($id);
        return view('index', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->categoryRepository->find($id);
        return view($this->viewAdminForm, compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->categoryRepository->update($id, [
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-'),
            'status' => $request->status,
            'updated_by' =>  Auth::user()->id,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Update succesfully!');
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
            $this->categoryRepository->delete($id);
        } catch (\Throwable $error) {
            return back()->with('error', "Lỗi ! Không thể xóa");
        }
        return back()->with('success', 'Delete Succesfully');
    }

    public function changeStatus($id)
    {
        return  $this->categoryRepository->changeStatus($id);
    }
}
