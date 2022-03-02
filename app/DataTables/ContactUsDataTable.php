<?php

namespace App\DataTables;

use App\Models\ContactUs;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContactUsDataTable extends DataTable
{
    public function dataTable($query)
    {    
        return datatables()
        ->eloquent($query)
        ->addColumn('action', function ($data) {
            return '<a href="' . route('admin.destroy_contact', $data->id) . '" class="btn-sm btn-danger">Delete</a>';
        })
        ->rawColumns(['image','action'])
        ->addIndexColumn();
    }
    public function query(ContactUs $model)
    {
        return $model->newQuery();
    }
    public function html()
    {
        return $this->builder()
                    ->setTableId('contactus-table')
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
            Column::make('name'),
            Column::make('email'),
            Column::make('phone'),
            Column::make('message'),
            Column::make('action'),
        ];
    }
    protected function filename()
    {
        return 'ContactUs_' . date('YmdHis');
    }
}
