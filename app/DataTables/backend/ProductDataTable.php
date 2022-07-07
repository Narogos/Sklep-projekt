<?php

namespace App\DataTables\backend;

use App\Models\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->addColumn('action', function (Product $model)
            {
                return view('backend.product.action', compact('model'));
            })
            ->editColumn('category', function($model)
            {
               return $model->category->name;
            })
            ->filterColumn('category_id', function($query, $keyword)
            {
               $query->whereHas('category', function($q) use ($keyword)
               {
                   $q->where('name', 'like', "%{$keyword}%");
               });
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        return $model::with('category')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('product-table')
            ->columns($this->getColumns())
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
            Column::make('name')->title('Produkt'),
            Column::make('category' , 'Kategoria'),
            Column::make('price')->title('Cena'),
            Column::make('quantity')->title('Ilość'),
            Column::make('created_at')->title('Produkt'),
            Column::computed('action')->title('Akcja')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'admin/Product_' . date('YmdHis');
    }
}
