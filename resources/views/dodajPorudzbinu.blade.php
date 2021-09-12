@extends('includes.master')



@section('nesto')
<form id="addProizvod" class="form-signin" onsubmit="dodajProizvod(event)">
   @csrf
   <h1 class="h3 mb-3 font-weight-normal">Napravite novi proizvod</h1>
    <input type="text" class="form-control" name="ime" placeholder="ime" value="{{old('ime')}}">
    <input type="text" class="form-control" name="cena" placeholder="cena" value="{{old('cena')}}">
    <button type="submit" class="btn btn-lg btn-primary btn-block">Napravi</button>
</form>

<script>
 function dodajProizvod(e) {
   e.preventDefault();
   var forma = $('#addProizvod');
   var ime = $("input[name='ime'", forma).val();
   var cena = $("input[name='cena'", forma).val();
   
   $.post('/api/proizvodi/create', {
    "_token": "{{ csrf_token() }}",
    ime: ime,
    cena: cena,
   }, function (success) {
    window.location.href = '/proizvodi';
   })
   return false;
 }
 </script>
@stop