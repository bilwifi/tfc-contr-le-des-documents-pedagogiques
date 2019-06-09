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
{{-- Modal --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Nouveau contrôle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- msg d'erreur --}}
        {{-- Formulaire Creation --}}
        <form id="prof_form" action="{{ route('admin.redirect_new_controle') }}" method="POST" name="prof_form" class="form-horizontal_create">
            @csrf
            <input type="text" name="idprofesseurs" hidden="" id="idprofesseurs">
            <div class="form-group">
	            <label for="profil"  class="control-label">Professeur</label>
	            <div class="col-sm-12">
	            	@inject('professeurs','App\Models\Professeur')
	               	<select class="form-control" id="idprofesseurs" name="idprofesseurs"   required="required">
	            	@foreach($professeurs->where('user_role','professeur')->get() as $prof)
	               		<option value="{{ $prof->idprofesseurs }}">
	               			{{ $prof->nom.' '.$prof->postnom.' ' .$prof->prenom }}
	               		</option>
	               	@endforeach
	               	</select>
	            </div>
	        </div>
              


        @include('partials._msgFlash')
        <div class="modal-footer">
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="submit" class="save btn btn-primary">Enregistrer</button>
        </div>
        </form>
        
      </div>
    </div>
  </div>
</div>	
@endsection
@push('scripts')
{!!$dataTable->scripts() !!}
@endpush