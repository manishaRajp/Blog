<?php

namespace App\DataTables;

use App\Models\Category;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class categoriesDataTable extends dataTable
{
    public function dataTable($query)
    {
        return datatables()
        ->eloquent($query)
        
        ->editColumn('status', function($data){
            if($data->status == '1'){
               return  '<a href="'.route('admin.status',$data->id).'" class="btn-sm btn-success">Active</a>';
            }else{
               return '<a href="'.route('admin.status',$data->id).'" class="btn-sm btn-danger">Inactive</a>';
            }
        })
        ->addColumn('action', function ($data) {
            if($data->status == '1'){
            return ' <form class="form-group" action="' . route('admin.category.destroy', $data->id) . '" method="POST"><a href="' . route('admin.category.edit', $data->id) . '" class="btn-sm btn-primary">Edit</a> 
            <input type="hidden" name="_token" value="' . csrf_token() . '" />
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn-sm btn-danger">Delete</button>
              </div></form>
              ';
            }else{
                return "<b>You can not edit Category..You are Inactive</b>";
            }
        })
        ->rawColumns(['action','status'])
            ->addIndexColumn();
    }
    public function query(Category $model)
    {
        return $model->newQuery();
    }
    public function html()
    {
        return $this->builder()
                    ->setTableId('categories-table')
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
            Column::make('id')->data('DT_RowIndex')->
            orderable(false),
            Column::make('name'),
            Column::make('status'),
            Column::make('action'),
        ];
    }
    protected function filename()
    {
        return 'categories_' . date('YmdHis');
    }
}
