@extends('index')
@section('content')
    <h1 class="h1 mt-3 mb-3">Személyek</h1>

    <div class="text-center mt-3 mb-3">
        <a href="{{ route('person_xml_upload') }}" class="btn btn-outline-primary btn-sm me-3">
            <i class="fa fa-upload"></i> {{ trans('Feltöltés xml file-ból') }}
        </a>
        <a href="{{ route('log_index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fa fa-info-circle"></i> {{ trans('Log-ok megtekintés') }}
        </a>
    </div>

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
                <td>{{ $model->created_at->format('Y.m.d. H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
