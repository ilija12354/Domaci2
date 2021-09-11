@extends('includes.master')



@section('nesto')
<table id="porudzbine_list" class="table table-dark">
    <thead>
        <tr>
            <th>Naziv</th>
            <th>Cena</th>
            <th>Akcija</th>
        </tr>
    </thead>
    <tbody>
     <tr>
      <td>{{ $porudzbina->ime }}</td>
      <td> {{ $porudzbina->cena }}</td>
      <td><a onclick="obrisi({{ $porudzbina->id }})"> Obrisi </a>
    </tbody>
</table>

<script>
 function obrisi(id) {
  $.ajax({
   url: '/api/proizvodi/' + id,
   type: 'delete',
   success: function (data) {
    window.location.href = '/proizvodi';
   },
   error: function (error) {
    alert(error);
   },
  });
 }
 </script>
@stop