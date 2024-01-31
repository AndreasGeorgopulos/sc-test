@extends('index')
@section('content')
    <h1 class="h1 mt-3 mb-3">{{ trans('Feltöltés') }}</h1>

    <form method="post" enctype="multipart/form-data" class="text-center mt-3 mb-3">
        @csrf
        <div class="row">
            <div class="col-6">
                <input type="file" name="xml_file" class="form-control input-sm" />
            </div>
            <div class="col-4 text-start">
                <button type="submit" class="btn btn-primary me-3">
                    <i class="fas fa-upload"></i> Feltöltés
                </button>

                <a href="{{ route('person_index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-angle-left"></i> {{ trans('Vissza') }}
                </a>
            </div>
        </div>
    </form>

    <hr/>

    @if ($errors->has('xml_file'))
        <div class="alert alert-danger">
            {{ $errors->first('xml_file') }}
        </div>
    @endif

    @include('person._results')
@endsection
