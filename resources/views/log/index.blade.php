@extends('index')
@section('content')
    <h1 class="h1 mt-3 mb-3">{{ trans('Log-ok') }}</h1>

    <div class="text-center mt-3 mb-3">
        <a href="{{ route('person_index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-angle-left"></i> {{ trans('Vissza') }}
        </a>
    </div>

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
