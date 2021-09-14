@extends('includes.master')



@section('nesto')
<form action="{{route('dodajPorudzbinu')}}" method="get">
    @csrf
    <button type="submit" class="btn btn-dark">Dodaj nov proizvod</button>
</form>
<input id="pretraga" type="text" placeholder="pretrazi"/>
<button type="button" class="btn btn-dark" onclick="pretrazi()">Pretrazi</button>
<table id="porudzbine_list" class="table table-dark">
    <thead>
        <tr>
            <th>Naziv</th>
            <th>Cena</th>
            <th>Akcija</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<script>
    $(document).ready(function() {
            var tableBody = $('#porudzbine_list tbody');
            $.get('api/proizvodi',function(data){
                for (var i = 0; i < data.length; i++) {
                    var newLine = '<tr><td>' + data[i].ime + '</td><td>' + data[i].cena + '</td> \
                    <td><a href="proizvodi/' + data[i].id + '">Pogledaj proizvod</a> </td></tr>';
                    tableBody.append(newLine);
                }
            });
            
        } );

        function pretrazi() {
            var upit = $('#pretraga').val();
            $.ajax({
                url: 'api/proizvodi/search',
                type: 'get',
                data: {
                    upit: upit
                },
                success: function (data) {
                    var tableBody = $('#porudzbine_list tbody');
                    tableBody.empty();
                    for (var i = 0; i < data.length; i++) {
                        var newLine = '<tr><td>' + data[i].ime + '</td><td>' + data[i].cena + '</td> \
                        <td><a href="proizvodi/' + data[i].id + '">Vidi</a> </td></tr>';
                        tableBody.append(newLine);
                    }
                }
            })
        }
</script>
@stop