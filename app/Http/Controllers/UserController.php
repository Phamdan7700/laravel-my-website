<?php

namespace App\Http\Controllers;

use App\Models\User as MainModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected $viewName = 'user';
    protected $viewAdmin;
    protected $viewAdminForm;
    protected $viewPage;

    public function __construct()
    {
        $this->viewAdmin = 'admin.' . $this->viewName;
        $this->viewAdminForm = 'admin.' . $this->viewName . '-form';
        $this->viewPage = 'page' . $this->viewName;
    }

    public function index(Request $request)
    {
        $filter = $request->filter_status;
        $viewName = $this->viewName;
        $items = MainModel::all();
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
        return view($this->viewAdminForm);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:255',
            'status' => 'required',
        ]);

        $items = MainModel::create([
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-'),
            'order' => '1',
            'status' => $request->status,
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
        $items = MainModel::findOrFail($id);
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
        $item = MainModel::findOrFail($id);
        return view($this->viewAdminForm, compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = MainModel::findOrFail($id);
        $item->name = $request->name;
        $item->status = $request->status;
        $item->save();
        return redirect()->route('admin.user.index')->with('success', 'Update succesfully!');
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
}
