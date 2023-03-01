@extends('layouts.master')
@push('css')
    <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{url('https://code.jquery.com/jquery-3.5.1.min.js')}}"></script>
    <script src="{{url('https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js')}}"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    {{--    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css')}}">--}}
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
                        <h3 class="section-title">Form Ubah Galeri</h3>
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
                        {!! Form::model($data, ['url'=>route('galeri.update', $data->id), 'files' => true, 'method'=> 'put']) !!}
                        <div class="messages"></div>
                        @include('admin.galeri._form')
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
    <script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    {{--    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js')}}"></script>--}}
    <script>
        $(document).ready(function () {
            $('form').parsley();
            $(".select2").select2({
                width: '100%'
            });
            $('#date').datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    </script>
@endpush
