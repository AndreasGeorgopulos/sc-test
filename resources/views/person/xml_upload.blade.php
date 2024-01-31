@extends('index')
@section('content')

    <h1>{{ trans('Feltöltés') }}</h1>

    <a href="{{ route('person_index') }}">{{ trans('Vissza') }}</a>

    <form method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="xml_file" />

        <button type="submit">Feltöltés</button>
    </form>

    <hr />

    @if ($errors->has('xml_file'))
        <div class="alert alert-danger">
            {{ $errors->first('xml_file') }}
        </div>
    @endif

    @include('person.results')
@endsection
