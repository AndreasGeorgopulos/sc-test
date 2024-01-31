@if($results = session('person_xml_processor_results'))
    <table class="table table-striped">
        <thead>
        <tr class="text-center">
            <th></th>
            <th>ADOAZONOSITOJEL</th>
            <th>TELJESNEV</th>
            <th>AZONOSITO</th>
            <th>EGYEBID</th>
            <th>BELEPES</th>
            <th>KILEPES</th>
            <th>EMAILCIM</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($results as $index => $result)
            @php
                $success = $result['success'];
                $model = $result['model'];
                $errors = $result['errors'];
                $iconClassName = $success ? 'fas fa-check text-success' : 'fas fa-ban text-danger';
            @endphp
            <tr class="text-center">
                <td>
                    <i class="{{ $iconClassName }}"></i>
                </td>
                <td>{{ $model->tax_number }}</td>
                <td>{{ $model->full_name }}</td>
                <td>{{ $model->id }}</td>
                <td>{{ $model->other_id }}</td>
                <td>{{ $model->login_at }}</td>
                <td>{{ $model->logout_at }}</td>
                <td>{{ $model->email }}</td>
                <td>
                    @if(!empty($errors))
                        <ul>
                            @foreach($errors as $error)
                                <li class="">
                                    <sub>{{ implode(', ', $error) }}</sub>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
