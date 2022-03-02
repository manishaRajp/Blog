<?php

namespace App\DataTables;

use App\Models\CMS;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CMSDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('admin.destroy_about', $data->id) . '" class="btn-sm btn-danger">Delete</a>&nbsp;<a href="' . route('admin.about', $data->id) . '"  class="btn-sm btn-info">edit</a>';
            })
            ->editColumn('image', function ($data) {
                return '<img src="' . asset($data->image) . '" class="img-thumbnail">';
            })
            ->rawColumns(['image', 'action'])
            ->addIndexColumn();
    }
    public function query(CMS $model)
    {
        return $model->newQuery();
    }
    public function html()
    {
        return $this->builder()
            ->setTableId('cms-table')
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
            Column::make('id'),
            Column::make('title'),
            Column::make('image'),
            Column::make('action'),
        ];
    }
    protected function filename()
    {
        return 'CMS_' . date('YmdHis');
    }
}
