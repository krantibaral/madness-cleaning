@extends('admin.templates.index')

@section('title', $title)

@section('content_header')
    <h1>Services</h1>
@stop

@push('styles')
@endpush

@section('index_content')
    <div class="table-responsive">
        <table class="table" id="data-table">
            <thead>
                <tr class="text-left text-capitalize">
                    <th>id</th>
                    <th>name</th>
                    <th>price</th>
                    <th>action</th>
                </tr>
            </thead>

        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('services.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
            });
        });
    </script>
@endpush
