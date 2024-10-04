@extends('admin.templates.index')

@section('title', $title)

@section('content_header')
    <h1>House Cleaning Services</h1>
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
            
                    <th>Phone</th>

                    <th>Number of Bedrooms</th>
                    <th>Number of Bathrooms</th>
                    <th>Number of Stories</th>


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
                ajax: "{{ route('house_cleaning_services.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
             
                    {
                        data: 'phone',
                        name: 'phone'
                    },

                    {
                        data: 'number_of_bedroom',
                        name: 'number_of_bedroom'
                    },
                    {
                        data: 'number_of_bathroom',
                        name: 'number_of_bathroom'
                    },
                    {
                        data: 'number_of_story',
                        name: 'number_of_story'
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
