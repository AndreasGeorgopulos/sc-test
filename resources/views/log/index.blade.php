@extends('index')
@section('content')
    <h1>{{ trans('Log-ok') }}</h1>

    <a href="{{ route('person_index') }}">{{ trans('Vissza') }}</a>

    <table class="table table-striped">
        <thead>
        <tr class="text-center">
            <th>{{ trans('Bejegyzés ideje') }}</th>
            <th>{{ trans('Üzenet') }}</th>
        </tr>
        </thead>

        <tbody>
        @foreach($logs as $model)
            <tr class="text-center">
                <td>{{ $model->created_at->format('Y.m.d. H:i') }}</td>
                <td>{{ $model->log_text }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
