<?php

namespace App\DataTables;

use App\Models\Blog;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('status', function ($data) {
                if ($data->status == '1') {
                    return  '<a href="' . route('admin.change', $data->id) . '" class="btn-sm btn-success">Active</a>';
                } else {
                    return '<a href="' . route('admin.change', $data->id) . '" class="btn-sm btn-danger">Inactive</a>';
                }
            })
            ->addColumn('action', function ($data) {
                if ($data->status == '1') {
                    return ' <form class="form-group" action="' . route('admin.blogs.destroy', $data->slug) . '" method="POST"><a href="' . route('admin.blogs.edit', $data->slug) . '" class="btn btn-dark btn-icon-text-sm"><i class="icon-doc btn-icon-append">&nbsp;Edit</i></a> 
                <input type="hidden" name="_token" value="' . csrf_token() . '" />
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn-sm btn-danger">Delete</button>
                  </div></form>
                  ';
                } else {
                    return "<b>You are inactive</b>";
                }
            })
            ->addColumn('like', function ($data) {
                return $data->likes ? $data->likes->count() : 0;
            })
            ->editColumn('image', function ($data) {
                return '<img src="' . asset('storage/profile/' . $data->image) . '" class="img-thumbnail" width="150%" ></img>';
            })
            ->editColumn('category_id', function ($data) {
                return $data->category->name;
            })
            ->filterColumn('category_id', function ($data, $keyword) {
                $sql = "categories.name like ?";
                $data->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['action', 'category_id', 'image', 'status', 'like'])
            ->addIndexColumn();
    }
    public function query(Blog $model)
    {
        $model = $model->leftjoin('categories', 'categories.id', '=', 'blogs.category_id')
            ->select('blogs.*', 'categories.name')
            ->newQuery();
        return $model->with('likes')->newQuery();
    }
    public function html()
    {
        return $this->builder()
            ->setTableId('blog-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('lfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }
    protected function getColumns()
    {
        return [
            Column::make('id')->data('DT_RowIndex')->orderable(false),
            Column::make('title'),
            Column::make('slug'),
            Column::make('category_id')->title('Category'),
            Column::make('image'),
            Column::make('status'),
            Column::make('like'),
            Column::make('published_at')->title('Publish'),
            Column::make('action'),
        ];
    }
    protected function filename()
    {
        return 'Blog_' . date('YmdHis');
    }
}
