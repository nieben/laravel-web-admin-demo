@if ($index == '0')
    <tbody>
    @foreach ($data as $key => $row)
    <tr>
        <th></th>
        @foreach ($data[$key] as $sKey => $value)
            <th>{{$sKey}}</th>
        @endforeach
    </tr>
    <tr>
        <td>{{$key}}</td>
        @foreach ($data[$key] as $sKey => $value)
            <td>{{$value}}</td>
        @endforeach
    </tr>
    @endforeach
    </tbody>
@else
    <tbody>
    <tr>
        <th></th>
        @foreach ($data[$index] as $key => $value)
            <th>{{$key}}</th>
        @endforeach
    </tr>
    <tr>
        <td>{{$index}}</td>
        @foreach ($data[$index] as $key => $value)
            <td>{{$value}}</td>
        @endforeach
    </tr>
    </tbody>
@endif
