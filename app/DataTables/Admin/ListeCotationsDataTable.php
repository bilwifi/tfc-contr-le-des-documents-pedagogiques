<?php

namespace App\DataTables\Admin;

use App\Models\Controles_document;
use Yajra\DataTables\Services\DataTable;

class ListeCotationsDataTable extends DataTable
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
                '<a href="'.route('admin.get_controle',[$query->idcontroles_documents]) .'" class="edit-modal btn btn-info">
                  <span class="fa fa-eye"></span> 
                </a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Controles_document $model)
    {
        return $model->JoinProf()
                      ->orderBy('created_at','DESC')
                      ->get([
                        'controles_documents.idcontroles_documents',
                        'controles_documents.created_at',
                        'controles_documents.remarques',
                        'professeurs.idprofesseurs',
                        'professeurs.nom',
                      ]);
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
                    ->addAction(['width' => '80px'])
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
            'nom'=>[
                        'name'=>'nom',
                        'data' => 'nom',
                        'title' => 'Professeur',
                        'searchable' => true,
                        'orderable' => true,
                        // 'render' => 'pap',
                        'exportable' => true,
                        'printable' => true,
                    ],
            'created_at'=>[
                        'name'=>'created_at',
                        'data' => 'created_at',
                        'title' => 'Date du contrôle',
                        'searchable' => true,
                        'orderable' => true,
                        // 'render' => 'function(created_at){return created_at}',
                        'exportable' => true,
                        'printable' => true,
                    ],
            'remarques'=>[
                        'name'=>'remarques',
                        'data' => 'remarques',
                        'title' => 'Remarque',
                        'searchable' => false,
                        'orderable' => false,
                        // 'render' => 'pap',
                        'exportable' => true,
                        'printable' => true,
                    ],
           
        ];
    }

    protected function getBuilderParameters(){
        return [
            'order' => [[2,'DESC']]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Admin/ListeCotations_' . date('YmdHis');
    }
}
