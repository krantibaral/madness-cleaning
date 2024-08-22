@extends('adminlte::page')

@section('title')
    @isset($isReset)
        @if ($isReset)
            Reset {{ $title }}
        @else
            Edit {{ $title }}
        @endif
    @else
        Edit {{ $title }}
    @endisset
@stop

@section('content_header')
    <h1>{{ isset($isReset) ? ($isReset ? 'Reset' : 'Edit') : 'Edit' }} {{ $title }}</h1>
@stop



@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form repeater" id="form" action="{{ route($route . 'update', $item->id) }}"
                            method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                @endif
                                @yield('form_content')

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="javascript:history.back();" class="btn btn-default float-right">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('js')
    @yield('ext_js')
    <script>
        jQuery(document).ready(function() {
            $('#experience-field #summernote-experience').summernote();
            $('#awards-field #summernote-awards').summernote();
            // Function to handle role change
            // $('#role').change(function() {
            //     var selectedRole = $(this).val();
            //     // Show or hide staff-specific fields based on selected role
            //     if (selectedRole == 'staff') {
            //         $('#staff-fields').show();
            //         $('#qualification-field').show();
            //         $('#others-field').show();
            //         $('select[name="designation"]').trigger(
            //         'change'); // Trigger change event for designation dropdown when staff is selected
            //     } else {
            //         $('#staff-fields').hide();
            //         $('#qualification-field').hide();
            //         $('#others-field').hide();
            //         $('#specialist-field').hide();
            //     }
            // });

            // Function to handle designation change
            $('select[name="designation"]').change(function() {

                var selectedDesignation = $(this).val();

                if (selectedDesignation == 'Doctor') {
                    $('#specialist-field').show();
                    $('#experience-field').show();
                    $('#awards-field').show();
                } else {
                    $('#specialist-field').hide();
                    $('#experience-field').hide();
                    $('#awards-field').hide();
                }
            });


            $('#summernote').summernote({
                height: 150,
                callbacks: {
                    onImageUpload: function(files) {
                        for (let i = 0; i < files.length; i++) {
                            $.upload(files[i]);
                        }
                    },
                    onMediaDelete: function(target) {
                        const src = $(target[0]).attr('src');
                        const imageId = $(target[0]).attr('data-id');

                        deleteFile(imageId);
                    }
                },
            });
            $('#summernote1').summernote({
                height: 150,
                callbacks: {
                    onImageUpload: function(files) {
                        for (let i = 0; i < files.length; i++) {
                            $.upload(files[i]);
                        }
                    },
                    onMediaDelete: function(target) {
                        const src = $(target[0]).attr('src');
                        const imageId = $(target[0]).attr('data-id');

                        deleteFile(imageId);
                    }
                },
            });
            $('#summernote2').summernote({
                height: 150,
                callbacks: {
                    onImageUpload: function(files) {
                        for (let i = 0; i < files.length; i++) {
                            $.upload(files[i]);
                        }
                    },
                    onMediaDelete: function(target) {
                        const src = $(target[0]).attr('src');
                        const imageId = $(target[0]).attr('data-id');

                        deleteFile(imageId);
                    }
                },
            });

            $.upload = function(file) {
                let out = new FormData();
                out.append("_token", "{{ csrf_token() }}")
                out.append('file', file, file.name);

                $.ajax({
                    headers: {
                        "X-CSRFToken": '{{ csrf_field() }}'
                    },
                    method: 'POST',
                    url: '{{ route('uploader.store') }}',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: out,
                    success: function(data) {
                        if (data['status']) {
                            var url = data['data']['url'];
                            var id = data['data']['id'];

                            $('#summernote').summernote('insertImage', url, function($image) {
                                $image.attr('data-id', id);
                            });
                        } else {
                            showFailedMessage()
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                        showFailedMessage()
                    }
                });
            }

            function deleteFile(id) {
                var url = '{{ route('uploader.destroy', ':id') }}';
                url = url.replace(':id', id);

                $.ajax({
                    method: 'POST',
                    dataType: 'JSON',
                    url: url,
                    data: {
                        'id': id,
                        '_token': '{{ csrf_token() }}',
                        '_method': 'DELETE',
                    },
                    success: function(data) {

                    },

                    error: function(jqXHR, textStatus, errorThrown) {
                        showFailedMessage()
                    }
                });
            }
        });

        
    </script>

@endsection
