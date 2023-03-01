@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" type="text/css"/>
    <link href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <section>
        <div class="container-xl">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Rincian Galeri</h3>
                        <img src="{{asset('images/wave.svg')}}" class="wave" alt="wave"/>
                    </div>
                    <div class="comment-form rounded bordered padding-30">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nama Kegiatan</th>
                                <td>: {{$data->nama_kegiatan}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>: {{Carbon\Carbon::parse($data->date)->isoFormat('D MMMM Y')}}</td>
                            </tr>
                            <tr>
                                <th>Tempat</th>
                                <td>: {{$data->tempat}}</td>
                            </tr>
                            </thead>
                        </table>
                        <div class="callout callout-info mb-4">
                            <h5><i class="fas fa-info"></i> Info:</h5>
                            1. Ukuran file gambar maksimal 2 MB. <br>
                            2. Hanya dapat mengunggah 5 file gambar. <br>
                            3. Ekstensi yang diterima adalah .jpg, .jpeg, .png.<br>
                        </div>
                        <div>
                            <div class="card">
                                <form action="#" class="dropzone" id="dropzonewidget" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input hidden name="file" id="file" type="text"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3>Gambar @if($data->media->count() != 0)
                            <a href="#" class="btn btn-danger hapus-data">Reset</a>
                        @endif</h3>
                    <div class="masonry-thumbs grid-container grid-3" data-big="2" data-lightbox="gallery">
                        @foreach($data->media as $image)
                            <a class="grid-item" href="{{route('media.file', $image->id)}}"
                               data-lightbox="gallery-item"><img
                                    src="{{route('media.file', $image->id)}}" alt="Gallery Thumb 1"></a>
                        @endforeach
                    </div>

                    <div class="divider"><i class="icon-circle"></i></div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="{{asset('assets/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/js/functions.js')}}"></script>
    <script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
    <script>
        $(document).ready(function () {
        });
        var accept = "image/*";
        Dropzone.autoDiscover = false;
        var fileList = new Array;
        var i = 0;
        // Dropzone class:
        var myDropzone = new Dropzone("#dropzonewidget", {
            url: "{{route('media.store',$data->id)}}",
            acceptedFiles: accept,
            uploadMultiple: false,
            createImageThumbnails: false,
            addRemoveLinks: true,
            maxFiles: 5,
            maxFilesize: 2,
            init: function () {
                this.on("success", function (file, serverFileName) {
                    file.serverFn = serverFileName;
                    console.log(file.serverFn)
                    fileList[i] = {
                        "serverFileName": serverFileName,
                        "fileName": file.name,
                        "fileId": i
                    }
                    i++;
                });
            },
            removedfile: function (file) {
                var name = file.serverFn;
                $.ajax({
                    type: 'DELETE',
                    url: "{{route('media.delete')}}",
                    data: "id=" + name,
                    dataType: 'html'
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        })
    </script>
    <script !src="">
        $(document).ready(function () {
            $('body').on('click', '.hapus-data', function () {
                swal({
                    title: "Menghapus data berita",
                    text: "Anda tidak dapat mengembalikan data yang sudah terhapus!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Iya!",
                    cancelButtonText: "Tidak!",
                }).then(
                    function (result) {
                        $.ajax({
                            url: "{{ route('media.reset', $data->id) }}/",
                            method: "DELETE",
                        }).done(function (msg) {
                            location.reload();
                        }).fail(function (textStatus) {
                            alert("Request failed: " + textStatus);
                        });
                    },
                    function (dismiss) {
                        // dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
                        // swal("Cancelled", "Data batal dihapus", "error");
                    });
            });
        })
    </script>
@endpush
