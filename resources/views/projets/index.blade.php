@extends('layouts.master')

@section('content')

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> <!-- end .flash-message -->
@if(isset($projets))
@if (count($projets))
<div>
<table class="table table-condensed">
<thead>
<tr>
<th>Code de projet</th>
<th> Nom de client </th>
<th>Description</th>
<th> Date de debut </th>
<th>Date de fin</th>
</tr>
</thead>
@for ($i=0; $i<count($projets);$i++)
<tr>
<td><a href= "{!! url('projets/afficher',$projets[$i]->id) !!}"> {{ $projets[$i]->code }} </a></td>
<td> {{ $projet_data[$i][0] }} </td>
<td> {{ $projets[$i]->description }} </td>
<td> {{ $projets[$i]->date_debut }} </td>
<td> {{ $projets[$i]->date_fin }} </td>


<td><a href="{{ url('projets/modifier',$projets[$i]->id) }}" class="btn btn-primary">Modifier</a> </td>
<td><a id='lien' href="#" dataref="{{ url('projets/supprimer',$projets[$i]->id) }}"  class="btn btn-danger bbb">Supprimer</a></td>
</tr>

@endfor
</table>
</div>
@endif
@endif
    <!--  simple view ends here   -->

<a href={{url('projets/add')}} class="btn btn-success">Ajouter un projet</a>

{!! $projets->render() !!}
 


<script>
$(document).ready(function() {
$(".bbb").on("click", function (e) {
    // Init
	
var link = $(this).attr("dataref");
    // Show Message        
    bootbox.confirm("Vous etes sur de vouloir supprimer cette projet ?", function (result) {
        if (result) {           
	                    document.location.href = link;  // if result, "set" the document location       
        }
    });
});
});

</script>


@stop
