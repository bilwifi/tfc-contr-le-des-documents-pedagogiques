@extends('layouts.admin-master')
@section('content')
<div class="card " style=" margin-top: 10%;">
  {{-- <div class="card-header">
    Quote
  </div> --}}

  <div class="card-body">
    <div class="row">
    	<div class="col-sm-4">
    		<div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
			  {{-- <div class="card-header">Header</div> --}}
			  <div class="card-body">
			    <button type="button" class="addModal btn btn-primary" data-toggle="modal" data-target="#addModal" >
			    	<h5 class="card-title " ><i class="fas fa-plus-circle fa-2x"></i></h5>
			    	<h5 class="card-text">NOUVEAU CONTRÔLE</h5>
			    </button>
			  </div>
			</div>
    	</div>
    	<div class="col-sm-4">
    		<div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
			  {{-- <div class="card-header">Header</div> --}}
			  <div class="card-body">
			    <a href="{{ route('admin.get_list_controle') }}" class="btn btn-primary">
			    	<h5 class="card-title " ><i class=" fas fa-archive fa-2x"></i></h5>
			    	<h5 class="card-text">ARCHIVES CONTRÔLES</h5>
			    </a>
			  </div>
			</div>
    	</div>
    	<div class="col-sm-4">
    		<div class="card text-center text-white bg-primary mb-3" style="max-width: 18rem;">
			  {{-- <div class="card-header">Header</div> --}}
			  <div class="card-body">
			    <a href="{{ route('admin.get_prof') }}" class="btn btn-primary">
			    	<h5 class="card-title " ><i class=" fas fa-user fa-2x"></i></h5>
			    	<h5 class="card-text">ENSEIGNANTS</h5>
			    </a>
			  </div>
			</div>
    	</div>
    	
    </div>
  </div>
      @include('partials.includes.formulaires.newControleForm')

</div>
@endsection