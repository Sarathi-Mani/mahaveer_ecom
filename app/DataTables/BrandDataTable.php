<?php

namespace App\DataTables;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BrandDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Brand> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
        ->eloquent($query)
        ->addColumn('action', function ($row) {
            $editUrl = route('admin.brand.edit', $row->id);
            $deleteUrl = route('admin.brand.destroy', $row->id);

            return '
                <a href="'.$editUrl.'" class="btn btn-sm btn-primary">Edit</a>

                <form action="'.$deleteUrl.'" method="POST" 
                      style="display:inline-block; margin-left:5px;">
                    '.csrf_field().'
                    '.method_field("DELETE").'
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm(\'Are you sure?\')">
                        Delete
                    </button>
                </form>
            ';
        })
        ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Brand>
     */
    public function query(Brand $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        
                    return $this->builder()
        ->setTableId('brand-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->addAction(['width' => '120px'])
        ->orderBy(0);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
       return [
        Column::make('id'),
        Column::make('name'),
        Column::make('logo'),
        Column::make('status'),
        Column::make('created_at'),
    ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Brand_' . date('YmdHis');
    }
}
