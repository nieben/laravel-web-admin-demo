<tbody>
<tr>
    <th></th>
    @foreach ($data as $key => $value)
        <th>$key</th>
    @endforeach
</tr>
<tr>
    <td>{{$index}}</td>
    @foreach ($data as $key => $value)
        <td>$value</td>
    @endforeach
</tr>
</tbody>