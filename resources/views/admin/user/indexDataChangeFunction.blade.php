<form method="post" class="form-inline" id="search_indexes_form" action="{{url('/admin/user/index_data')}}">
    {{ csrf_field() }}
    <div class="form-group" style="width: 15%">
        <select class="form-control" id="function" name="function">
            @foreach ($userInformation['functions'] as $key => $value)
                <option value="{{$key}}"
                        @if ($key == $function)
                            selected
                        @endif
                >{{$value}}</option>
            @endforeach
        </select>
        <input type="hidden" name="id" value="{{$id}}">
    </div>
    &nbsp;&nbsp;
    <div class="form-group" style="width: 10%">
        <select class="form-control" id="role" name="role">
            <option value="0">全部</option>
            @foreach ($userInformation['indexes'] as $value)
                <option value="{{$value}}">{{$value}}</option>
            @endforeach
        </select>
    </div>
</form>

<table class="table table-bordered product-table">
    <tbody>
    <tr>
        <th></th>
        @foreach ($userInformation['data'] as $key => $value)
            <th>{{$key}}</th>
        @endforeach
    </tr>
    <tr>
        <td>{{$userInformation['indexes'][0]}}</td>
        @foreach ($userInformation['data'] as $key => $value)
            <td>{{$value}}</td>
        @endforeach
    </tr>
    </tbody>
</table>