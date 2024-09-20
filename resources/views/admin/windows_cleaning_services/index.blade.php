@extends('admin.templates.index')

@section('title', $title)

@section('content_header')
    <h1>Windows Cleaning Services</h1>
@stop

@push('styles')
@endpush

@section('index_content')
    <div class="table-responsive">
        <table class="table" id="data-table">
            <thead>
                <tr class="text-left text-capitalize">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>

                    <th>Number of Windows</th>
                    <th>Service Date</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
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
                ajax: "{{ route('windows_cleaning_services.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },

                    {
                        data: 'number_of_windows',
                        name: 'number_of_windows'
                    },
                    {
                        data: 'service_date',
                        name: 'service_date'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
        });
    </script>
@endpush
