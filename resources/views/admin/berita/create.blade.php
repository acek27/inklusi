@extends('layouts.master')
@push('css')
    <link href="{{asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .parsley-errors-list li.parsley-required {
            color: red;
        }

        /*.note-btn {*/
        /*    background-color: #afaeae !important;*/
        /*    color: white !important;*/
        /*}*/
    </style>
@endpush
@section('content')
    <section>
        <div class="container-xl">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Form Tambah Berita</h3>
                        <img src="{{asset('images/wave.svg')}}" class="wave" alt="wave"/>
                    </div>
                    <div class="comment-form rounded bordered padding-30">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['url'=>route('berita.store'), 'files' => true]) !!}
                        <div class="messages"></div>
                        <div class="column col-md-12">
                            <!-- Email input -->
                            <div class="form-group">
                                {{ Form::label('title', 'Judul Berita', ['class' => 'col-form-label']) }}
                                {{ Form::text('title',null,[
                                    'class'=>'form-control',
                                    'id' => 'title',
                                    'required' => 'required'
                                ]) }}
                            </div>
                            <div class="row">
                                <div class="column col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('editor', 'Penulis', ['class' => 'col-form-label']) }}
                                        {{ Form::text('editor',null,[
                                            'class'=>'form-control',
                                            'id' => 'editor',
                                            'required' => 'required'
                                        ]) }}
                                    </div>
                                </div>
                                <div class="column col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('category_id', 'Kategori', ['class' => 'col-form-label']) }}
                                        {{ Form::select('category_id', $kategori,null,[
                                                   'class'=>'form-control',
                                                   'id' => 'category_id',
                                                   'placeholder' => '-- Pilih Kategori --',
                                                   'required' => 'required']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('content', 'Konten Berita', ['class' => 'col-form-label']) }}
                                {{ Form::textarea('content',null,[
                                    'class'=>'summernote',
                                    'id' => 'content',
                                    'required' => 'required'
                                ]) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('path', 'File Gambar', ['class' => 'col-form-label']) }}
                                {{ Form::file('path', [
                                  'class' => 'form-control dropify',
                                  'id' => 'path',
                                  'data-max-file-size' => '1M',
                                  'data-allowed-file-extensions' => 'png jpg jpeg',
                                  'required' => 'required',
                              ]) }}
                            </div>
                        </div>
                        <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
                            Submit
                        </button><!-- Submit Button -->
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="{{asset('assets/plugins/timepicker/moment.js')}}"></script>
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/id.min.js')}}"></script>
    <script type="module" src="{{asset('assets/plugins/parsleyjs/id.js')}}"></script>
    <script src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <script src="{{asset('assets/plugins/timepicker/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <!--Summernote js-->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('form').parsley();
            $(".select2").select2({
                width: '100%'
            });
            $('.dropify').dropify({
                messages: {
                    'default': '',
                    'replace': '',
                }
            });
            $('.summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['link', ['link']]
                ]
            });
        });
    </script>
@endpush
