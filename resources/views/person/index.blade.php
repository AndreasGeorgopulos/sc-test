@extends('index')
@section('content')
    <h1>Személyek</h1>

    <a href="{{ route('person_xml_upload') }}">{{ trans('Feltöltés') }}</a>
    <a href="{{ route('log_index') }}">{{ trans('Log-ok') }}</a>

    <table class="table table-striped">
        <thead>
        <tr class="text-center">
            <th>ADOAZONOSITOJEL</th>
            <th>TELJESNEV</th>
            <th>AZONOSITO</th>
            <th>EGYEBID</th>
            <th>BELEPES</th>
            <th>KILEPES</th>
            <th>EMAILCIM</th>
            <th>Felvitel ideje</th>
        </tr>
        </thead>

        <tbody>
        @foreach($people as $model)
            <tr class="text-center">
                <td>{{ $model->tax_number }}</td>
                <td>{{ $model->full_name }}</td>
                <td>{{ $model->id }}</td>
                <td>{{ $model->other_id }}</td>
                <td>{{ $model->login_at }}</td>
                <td>{{ $model->logout_at }}</td>
                <td>{{ $model->email }}</td>
                <th>{{ $model->created_at->format('Y.m.d. H:i') }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
