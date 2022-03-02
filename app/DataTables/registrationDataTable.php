<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class registrationDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('admin.show', $data->id) . '" class="btn-sm btn-warning">Show</a>&nbsp;<a href="' . route('admin.destroy', $data->id) . '" class="btn-sm btn-danger">Delete</a>&nbsp;<a href="' . route('admin.changepass', $data->id) . '" class="btn-sm btn-info">change</a>
                  ';
            })
            ->editColumn('profile', function ($data) {
                return '<img src="'.asset(''.$data->profile).'" class="img-thumbnail">';
                
            })
             ->rawColumns(['profile','action'])
            ->addIndexColumn();
    }
    public function query(User $model)
    {
        return $model->newQuery();
    }
    public function html()
    {
        return $this->builder()
                    ->setTableId('registration-table')
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
            Column::make('email'),
            Column::make('profile'),
            Column::make('action'),
        ];
    }
    protected function filename()
    {
        return 'registration_' . date('YmdHis');
    }
}
