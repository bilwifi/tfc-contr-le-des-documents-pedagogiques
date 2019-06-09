@extends('layouts.admin-master')
@section('content')
<div class="card-header">
  	<div class="row">
		<div class="card-body text-center">
			<strong>ADK/BUREAU SOUS REGIONAL</strong> <br>
			<strong>DES ECOLES CONVENTIONNEES CATHOLIQUES</strong> <br>
			<strong>CONSEILLER : {{ $conseiller->nom .' '. $conseiller->prenom}}</strong> <br>
			<strong>RAPPORT N°ADK/E.C.CATH/CSRF/DJK/R/0{{ $controle->idcontroles_documents }}</strong><br>
		</div>
	</div>
	<div class="row">
		<div class="bordered card-body text-center">
			<h5 class="text-center">INSPECTION PEDAGOGIQUE : CONTRÔLE DES DOCUMENTS DE PROFESSEUR</h5>
		</div>
	</div>
	<div class="row card-body 	">
		<div class="col-6">
			1.ETABLISSEMENT <hr>
			Dénomination : {{ env('ETABLISSEMENT_DENOMINATION') }} <br>
			Identité Secope : {{ env('ETABLISSEMENT_IDSECOPE') }} <br>
			Adresse : {{ env('ETABLISSEMENT_ADRESSE') }} <br>

		</div>
		<div class="col-6">
			2.PROFESSEUR <hr>
			Nom,Postnom,Prénom : {{ $professeur->nom .' '.$professeur->postnom.' '.$professeur->prenom }} <br>
			Identité Secope : {{$professeur->idsecope}} <br>
			<div class="row">
				<div class="col">Qualification : {{$professeur->qualification}}</div>
				<div class="col">Attribution : {{$professeur->attribution}}</div>
				<div class="col">Anciennete : {{$professeur->anciennete}}</div>
			</div>
			
		</div>
	</div>
</div>
  <div class="card-body">
    <div class="row">
	<h5 class="text-center">DOCUMENTS CONTRÔLES</h5>
	</div>
	<div class="row">
		{{-- <div class="col-6"> --}}
			<?php 
				
				$max_total=0;
				$pts_total=0;
			?>
			{{-- @foreach($cotes as $cote) --}}
			<div class=" col-12" style="margin:1%">
			  {{-- <div class="">
			   <strong> {{ $cote[0]->type_documents }} </strong>
			  </div> --}}
			  <div class="">
			    <table class="table table-striped  ">
				  <thead>
				    <tr>
				      <th scope="col"></th>
				      <th scope="col">Pts</th>
				      <th scope="col">Max</th>
				    </tr>
				  </thead>
				  <tbody>
			@foreach($cotes as $cote)
				
				<?php 
					$max=0;
					$pts=0;
				?>
				<tr>
			      {{-- <th scope="col">Désignation</th> --}}
			      <th colspan="3" class="h4">{{ $cote[0]->type_documents }}</th>
			      {{-- <th scope="col">Max</th> --}}
			    </tr>
				  	@foreach($cote as $c)

				  	<?php 
						$max=$max+$c->max;
						$pts=$pts+$c->cote;
					?>
				    <tr>
				      <td>
				      	{{ $c->ponderations }}
				      	<p class="text-muted" style="margin-top: 0px;padding-top: 0px">{{ $c->commentaire }}</p>
				      </td>
				      <td>{{ $c->cote }}</td>
				      <td>{{ $c->max }}</td>
				    </tr>
				   	@endforeach
				   	<tr>
				      <th>Sous-total</th>
				      <th>{{ $pts }}</th>
				      <th>{{ $max }}</th>
				    </tr>
					<?php 
						$max_total=$max+$max_total;
						$pts_total=$pts+$pts_total;
					?>
				  
			@endforeach
					<tr>
				      <td>Remarques et Conseils</td>
				      <td colspan="2">{{ $controle->remarques }}</td>
				      
				    </tr>
				  </tbody>
				</table>
			  </div>
			</div>
			<br>
			
			{{-- @endforeach --}}
		{{-- </div> --}}
	</div>
  </div>
  <div class="card-footer">
    
    <div class="clearfix">
    	<div class="float-left">TOTAL GENERAL : {{ $pts_total .' / '. $max_total }}</div>
    	<div class="float-right">
    		APPRECIATION SYNTHETIQUE : {!! \App\Http\Controllers\Helper::get_appreciation($pts_total) !!}
    	</div>

    </div>
    <hr>
    <div class="clearfix">
    	<div class="float-left">Conseiller d'Enseignement : {{ $conseiller->nom .' '.$conseiller->prenom }} 
    	</div>
    	<div class=" float-right">Fait à Kinshasa: {{ $controle->created_at }}</div>

    </div>
  </div>
</div>
 <br><br>

@endsection