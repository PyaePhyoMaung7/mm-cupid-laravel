<style>
    table {
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>

<h3 style="margin-left: 170px; ">Cities</h3>

<table style="border: 1px solid black;">
    <thead>
        <tr style="border: 1px solid black;">
            <th style="width: 60px;">Id</th>
            <th style="width: 250px;">Name</th>
            <th style="width: 500px;">Members</th>
            <th style="">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cities as $city)
            <tr style="border: 1px solid black;">
                <td>{{ $city->id }}</td>
                <td>{{ $city->name }}</td>
                <td>
                    @if ($city->getMembersByCity != null)
                        {{ getMembersByCity($city->getMembersByCity) }}
                    @endif
                </td>
                <td>{{ $city->name }}</td>
                <td>
                    <a href="{{ route('edit.form', $city->id) }}"><button type="button">Edit</button></a>
                    <a href="{{ route('delete.form', $city->id) }}"><button type="button">Delete</button></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h3 style="margin-left: 170px; ">Members</h3>

<table style="border: 1px solid black;">
    <thead>
        <tr style="border: 1px solid black;">
            <th style="width: 60px;">Id</th>
            <th style="width: 250px;">Name</th>
            <th style="width: 500px;">City</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
            <tr style="border: 1px solid black;">
                <td>{{ $member->id }}</td>
                <td>{{ $member->username }}</td>
                <td>
                    @if ($member->getCityByMember != null)
                        {{ $member->getCityByMember->name }}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div style="width: 500px; margin: 30px auto;">
    @if (isset($edit_city))
        <form action="{{ url('/test/update') }}" style="width: 100%" method="POST">
            <input type="hidden" name="id" value="{{ isset($edit_city) ? $edit_city->id : '' }}">
        @else
            <form action="{{ url('test/store') }}" style="width: 100%" method="POST">
    @endif

    @csrf
    <label for="city">City Name</label>
    <input type="text" id="city" name="city"
        value="{{ old('city', isset($edit_city) ? $edit_city->name : '') }}" placeholder="Enter City Name">
    @if (session()->has('errors'))
        <span style="color: red;">{{ session('errors')->first('city') }}</span>
    @endif
    <input type="submit" value="{{ isset($edit_city) ? 'Update' : 'Create' }}">
    </form>
</div>

</div>
