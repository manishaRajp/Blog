<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\DataTables\categoriesDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Category\StoreRequest;

class CategoryController extends Controller
{
    public function index(categoriesDataTable $dataTable)
    { 
        $categories = Category::get();
        return $dataTable->render('admin.category.index');
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(StoreRequest $request)
    {
        $categories = new Category();
        $categories->name = $request['name'];
        $categories->save();
        $request->session()->flash('success', 'Your Data inserted successfully ');
        return redirect()->route('admin.category.index');
    }
    function statusUpdate(Category $category,Request $request)
    {
        if ($category->status == '1') {
            $category->status = '0';
        } else {
            $category->status = '1';
        }
        $category->save();

        session()->flash('success', 'Category status has been updated successfully.');
        return redirect()->route('admin.category.index');
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit', ['categories' => $categories]);
    }
    public function update(Request $request, $id)
    {
        $categories = Category::find($id);
        $categories->name = $request['name'];
        $categories->save();
        $request->session()->flash('success', 'Your Data inserted successfully ');
        return redirect()->route('admin.category.index');
    }
    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        $categories->Blog()->delete();
        return redirect()->route('admin.category.index')->with('error', 'data deleted');
    }
}
