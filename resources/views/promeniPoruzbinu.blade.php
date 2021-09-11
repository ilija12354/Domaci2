@extends('includes.master')



@section('nesto')
<form id="updateProizvod" class="form-signin" onsubmit="dodajProizvod(event, {{ $porudzbina->id }})">
   @csrf
   <h1 class="h3 mb-3 font-weight-normal">Promenite proizvod</h1>
    <input type="text" class="form-control" name="ime" placeholder="ime" value="{{$porudzbina->ime}}">
    <input type="text" class="form-control" name="cena" placeholder="cena" value="{{$porudzbina->cena}}">
    <button type="submit" class="btn btn-lg btn-primary btn-block">Promeni</button>
</form>

<script>
 function dodajProizvod(e, id) {
   e.preventDefault();
   var forma = $('#updateProizvod');
   var ime = $("input[name='ime'", forma).val();
   var cena = $("input[name='cena'", forma).val();
   
   $.post('/api/proizvodi/update/' + id, {
    ime: ime,
    cena: cena,
   }, function (success) {
    window.location.href = '/proizvodi';
   })
   return false;
 }
 </script>
@stop