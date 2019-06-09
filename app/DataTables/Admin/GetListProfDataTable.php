<?php

namespace App\DataTables\Admin;

use App\Models\Professeur;
use Yajra\DataTables\Services\DataTable;

class GetListProfDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function($query){
                return 
                '<button type="button" class="edit-modal btn btn-info" data-toggle="modal" data-target="#addModal"  data-info="'.$query->idprofesseurs.','.$query->idsecope.','.$query->nom.','.$query->postnom.','.$query->prenom.','.$query->attribution.','.$query->qualification.','.$query->anciennete.'">
                  <span class="fa fa-edit"></span> 
                </button>'
                 .'  '.
                '<button class="delete-modal btn btn-danger" data-info="'.$query->idetudiants.'">
                 <span class="fa fa-trash"></span> 
                </button>'
                ;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Professeur $model)
    {
        return $model->where('user_role','professeur')->get();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '100px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'idsecope',
            'nom',
            'postnom',
            'prenom',
            // 'attribution',
            // 'qualification',
            // 'anciennete',
            'pseudo',
        ];
    }

    protected function getBuilderParameters(){
        return [
            'order' => [[1,'Asc']]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin/GetListProf_' . date('YmdHis');
    }
}
