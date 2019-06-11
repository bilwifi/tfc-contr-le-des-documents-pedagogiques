@extends('layouts.admin-master')
@include('partials.includes.dataTables.dataTables')
@include('partials.includes.dataTables.buttons')
@section('content')
<div class="row">
      <div class="col-md-12">
       <h2 class="badge badge-pill badge-info">Contrôle des documents</h2>   
      </div>
  </div>
  <br>
<button type="button" class="addModal btn btn-info" data-toggle="modal" data-target="#addModal">
  		<span class="fas fa-plus"> </span> Nouveau contrôle
	</button><br><br>
<div class="card bg-light mb-3">
  <div class="card-body">
	{!!$dataTable->table() !!}
  </div>
</div>
@include('partials.includes.formulaires.newControleForm')


@endsection
@push('scripts')
{!!$dataTable->scripts() !!}
@endpush