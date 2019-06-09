@extends('layouts.admin-master')
@push('stylesheets')
    <link href="{{ asset('matrix/assets/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('matrix/assets/libs/jquery-steps/steps.css') }}" rel="stylesheet">
@endpush

@section('content')
      @include('partials._msgFlash')

	<div class="row">
	    <div class="col-md-12">
	     <h2 class="badge badge-pill badge-info">Contrôle des documents | {{ $professeurs->nom .' '.$professeurs->prenom }}</h2>   
	    </div>
	</div>
	<div class="card">
	  <div class="card-header">
	  	<div class="row">
	  		<div class="col-6">
	  			1.ETABLISSEMENT <hr>
	  			Dénomination : {{ env('ETABLISSEMENT_DENOMINATION') }} <br>
	  			Identité Secope : {{ env('ETABLISSEMENT_IDSECOPE') }} <br>
	  			Adresse : {{ env('ETABLISSEMENT_ADRESSE') }} <br>

	  		</div>
	  		<div class="col-6">
	  			2.PROFESSEUR <hr>
	  			Nom,Postnom,Prénom : {{ $professeurs->nom .' '.$professeurs->postnom.' '.$professeurs->prenom }} <br>
	  			Identité Secope : {{$professeurs->idsecope}} <br>
	  			<div class="row">
	  				<div class="col-4">Qualification : {{$professeurs->qualification}}</div>
	  				<div class="col-4">Attribution : {{$professeurs->attribution}}</div>
	  				<div class="col-4">Anciennete : {{$professeurs->anciennete}}</div>
	  			</div>
	  			
	  		</div>
	  	</div>
	  	{{-- Professeur : {{ $professeurs->nom .' '.$professeurs->prenom }}
	  	<br>
	  	Date : {!! date('d-m-Y')!!}
	  	<br>
	  	
	  	<h5><span class="badge badge-pill badge-secondary">Fiche de contrôle</span></h5> --}}
	  </div>
	  <div class="card-body">
	  	<form id="example-form" method="POST" class="m-t-40" action="{{ route('admin.new_controle_document') }}">
            @csrf
            <input type="text" name="idconseillers" hidden value="{{ auth()->user()->idprofesseurs }}">
            <input type="text" name="idprofesseurs" hidden value="{{ $professeurs->idprofesseurs }}">
            <div>
            	@foreach($fiche as $f)
                <h3>{{ $f[0]->types_document }}</h3>
                <section>
                	<div class="row">
            			<div class="col-6"><strong>{{ $f[0]->types_document }}</strong></div>
            			<div class="col-4">
            				<div class="row">
            					<div class="col-9"><strong>Pts</strong></div>
            					<div class="col-3"><strong>Max</strong></div>
            				</div>
            			</div>
            		</div>
            		<hr>
            		@foreach($f as $cote)

            		<div class="row">
            			<div class="col-6">
            				<label for="{{ $cote->slug  }}" style="margin-bottom: 0px">{{ $cote->ponderation }}</label>
            				<p class="text-muted" style="margin-top: 0px;padding-top: 0px">{{ $cote->commentaire }}</p>
            			</div>
            			<div class="col-4">
            				<div class="row">
            					<div class="col-9">
            						<input id="{{ $cote->slug  }}" name="{{ $cote->slug  }}" type="number" max="{{$cote->max}}" class="required form-control">
            					</div>
            					<div class="col-3">/{{ $cote->max }}</div>
            				</div>
            			</div>
            		</div>
            		<hr>
            		@endforeach
                </section>
                @endforeach
                <h3>Rémarques et conseils</h3>
                <section>
                    <div class="row">
                        <div class="col-12">
                            <label for="remarques">Rémarques et conseils</label>
                           	 <textarea class="form-control" id="remarques" name="remarques"></textarea>
                        </div>      
                    </div>
                 </section>
            </div>
        </form>
	  </div>
	  <div class="card-footer text-center">
		{{-- <a href="#" id="send-fiche" class="btn btn-primary btn-block">Envoyer la fiche</a> --}}
	  </div>
	</div>
	
@endsection
@push('scripts')
 <!-- this page js -->
    <script src="{{ asset('matrix/assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('matrix/assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script>
        // Basic Example with form
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
     form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            form.submit();
        }
    });


    </script>
@endpush