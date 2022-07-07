<?php

namespace App\DataTables\backend;

use App\Models\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function (Order $model)
            {
                return view('backend.order.action', compact('model'));
            })
            ->editColumn('Product', function ($model)
            {
                return $model->product->name;
            })
            ->filterColumn('product_id', function ($query, $keyword)
            {
                $query->whereHas('Product', function ($q) use ($keyword)
                {
                    $q->where('name', 'like', "%{$keyword}%");
                });
            })
            ->editColumn('User', function ($model)
            {
                return $model->user->name;
            })
            ->filterColumn('user_id', function ($query, $keyword)
            {
               $query->whereHas('User', function ($q) use ($keyword)
               {
                   $q->where('name', 'like', "%{$keyword}%");
               });
            });
    }


    public function query(Order $model)
    {
        return $model::with(['product', 'user'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('order-table')
            ->columns($this->getColumns())
            ->columns($this->getColumns())
            ->buttons(["csv", "excel", "pdf", "print"])
            ->minifiedAjax()
            ->dom('Bfrtlip')
            ->orderBy(1, 'asc');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('Produkt', 'product_id'),
            Column::make('User' , 'user_id'),
            Column::make('quantity')->title('Ilość'),
            Column::make('status')->title('Status'),
            Column::make('data_order')->title('Data Zamówienia'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'admin/Order_' . date('YmdHis');
    }
}
