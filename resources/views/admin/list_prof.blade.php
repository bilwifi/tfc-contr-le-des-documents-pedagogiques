@extends('layouts.admin-master')
@include('partials.includes.dataTables.dataTables')
@include('partials.includes.dataTables.buttons')
@section('content')
<div class="container">
	<button type="button" class="addModal btn btn-info" data-toggle="modal" data-target="#addModal">
  		<span class="fas fa-user-plus"> </span> Nouveau enseignant
	</button><br><br>

	<div class="row">
        <div class="col-md-12">
         <h2 class="badge badge-pill badge-info">Liste des enseignants</h2>   
        </div>
  </div>
	<div class="card bg-light mb-3">
	  <div class="card-body">
		{!!$dataTable->table() !!}
	  </div>
	</div>
</div>

{{-- Modal --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- msg d'erreur --}}
        {{-- Formulaire Creation --}}
        <form id="prof_form" action="{{ route('admin.store_prof') }}" method="POST" name="prof_form" class="form-horizontal_create">
            @csrf
            <input type="text" name="idprofesseurs" hidden="" id="idprofesseurs">
            <div class="form-group">
                  <label for="idsecope"  class="control-label">Identité Secope</label>
                  <div class="col-sm-12">
                      <input type="text"  class="form-control" id="idsecope" name="idsecope"  maxlength="50" required="">
                  </div>
              </div>
              <div class="form-group">
                  <label for="nom"  class="control-label">Nom</label>
                  <div class="col-sm-12">
                      <input type="text"  class="form-control" id="nom" name="nom"  maxlength="50" required="">
                  </div>
              </div>
              <div class="form-group">
                  <label for="postnom"  class="control-label">Postnom</label>
                  <div class="col-sm-12">
                      <input type="text"  class="form-control" id="postnom" name="postnom"  maxlength="50" >
                  </div>
              </div>
              <div class="form-group">
                  <label for="prenom"  class="control-label">Prenom</label>
                  <div class="col-sm-12">
                      <input type="text"  class="form-control" id="prenom" name="prenom"  maxlength="50" >
                  </div>
              </div>
            <div class="form-group">
	              <label for="attribution"  class="control-label">Attribution</label>
	              <div class="col-sm-12">
	                  <input type="text"  class="form-control" id="attribution" name="attribution"  maxlength="50" required="">
	              </div>
	        </div>
	        <div class="form-group">
	              <label for="qualification"  class="control-label">Qualification</label>
	              <div class="col-sm-12">
	                  <input type="text"  class="form-control" id="qualification" name="qualification"  maxlength="50" required="">
	              </div>
	        </div>
	        <div class="form-group">
	              <label for="anciennete"  class="control-label">Ancienneté</label>
	              <div class="col-sm-12">
	                  <input type="digits"  class="form-control" id="anciennete" name="anciennete"  maxlength="50" required="" >
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
@stop
@push('scripts')
{!!$dataTable->scripts() !!}

{{-- Scripts --}}
<script type="text/javascript">
  
  {{-- Ajout étudiant formulaire --}}
  $(document).on('click', '.addModal', function() {
      $('#msgErrors').html('');
      $('#msgErrors').attr('hidden','true');

    $('.modal-title').text('Ajouter');
    resetmodalData()
    $('.form-horizontal').trigger("reset");
    $('.form-horizontal').show();
    $('#myModal').modal('show');
    });

  {{-- edition du formulaire --}}
  $(document).on('click', '.edit-modal', function() {
      $('#msgErrors').html('');
      $('#msgErrors').attr('hidden','true');

      $('#footer_action_button').text(" Update");
      $('#footer_action_button').addClass('fas fa-check');
      $('#footer_action_button').removeClass('fas fa-trash');
      $('.actionBtn').addClass('btn-success');
      $('.actionBtn').removeClass('btn-danger');
      $('.actionBtn').removeClass('delete');
      $('.actionBtn').addClass('edit');
      $('.modal-title').text('Modifier');
      $('.deleteContent').hide();
      $('.form-horizontal').show();
      var stuff = $(this).data('info').split(',');
      fillmodalData(stuff)
      $('#myModal').modal('show');
      });

  // remplissage formulaire par les donnée d'une ligne selectionée
  function fillmodalData(details){
      $('#idprofesseurs').val(details[0]);
      $('#idsecope').val(details[1]);
      $('#nom').val(details[2]);
      $('#postnom').val(details[3]);
      $('#prenom').val(details[4]);
      $('#attribution').val(details[5]);
      $('#qualification').val(details[6]);
      $('#anciennete').val(details[7]);
      
      }

  function resetmodalData(){
      $('#idprofesseurs').val('');
      $('#idsecope').val('');
      $('#nom').val('');
      $('#postnom').val('');
      $('#prenom').val('');
      $('#attribution').val('');
      $('#qualification').val('');
      $('#anciennete').val('');
      
      }



  $('#prof_form').on('submit', function(e) {
    e.preventDefault();
    $('#msgErrors').html('');
        $('#msgErrors').attr('hidden','true');

    $.ajax({
      type: 'post',
      url: '{{ route('admin.store_prof') }}',
      data: {
        '_token': $('input[name=_token]').val(),
        'idprofesseurs': $("#idprofesseurs").val(),
        'idsecope': $("#idsecope").val(),
        'nom': $('#nom').val(),
        'postnom': $('#postnom').val(),
        'prenom': $('#prenom').val(),
        'attribution': $('#attribution').val(),
        'qualification': $('#qualification').val(),
        'anciennete': $('#anciennete').val(),
   
        },

      success: function(data) {
        $('#dataTableBuilder').DataTable().draw(false);
        $('#addModal').modal('hide');
        
      },

          error:function(data) {
            var errors = data.responseJSON.errors;
              $.each(errors, function (key, value) {
                document.getElementById('msgErrors').innerHTML += "<li>"+value+"</li>"
                $('#msgErrors').removeAttr('hidden');
            });
        }
    });
  });

  {{-- Suppression  --}}
  $(document).on('click', '.delete-modal', function() {
    $('#footer_action_button').text(" Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').removeClass('edit');
    $('.actionBtn').addClass('delete');
    $('.modal-title').text('Delete');
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    var stuff = $(this).data('info').split(',');
    $('.did').text(stuff[0]);
    $('.dname').html(stuff[1] +" "+stuff[2]);
    $('#myModal').modal('show');
  });

</script>
@endpush