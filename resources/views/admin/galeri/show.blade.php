@extends('layouts.master')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
@push('css')
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
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
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
@endpush
