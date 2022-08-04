<h1>
    Object list
</h1>

<table
border="1">
<tr>
    <td>ID</td>
    <td>Categortie</td>
    <td>Lost Date</td>
    <td>Find Date</td>
    <td>Location</td>
    <td>Created At</td>

</tr>

@foreach($objets as $objet)
<tr>
    <td>{{$objet['id']}}</td>
    <td>{{$objet['lost_date']}}</td>
    <td>{{$objet['find_date']}}</td>
    <td>{{$objet['location']}}</td>
    <td>{{$objet['created_at']}}</td>
    

</tr>
@endforeach
</table>