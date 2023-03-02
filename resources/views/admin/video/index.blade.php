@extends('layouts.master')
@push('css')
    <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            height: 0;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 80%;
            height: 80%;
        }
    </style>
@endpush
@section('content')
    <section>
        <div class="container-xl">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Tabel Kegiatan</h3>
                        <img src="{{asset('images/wave.svg')}}" class="wave" alt="wave"/>
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="d-flex justify-content-start">
                            <a href="{{route('video.create')}}" class="btn btn-default mb-4">Data Baru</a>
                        </div>
                        <table class="table" id="berita">
                            <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Embed Video</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('js')
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
    <script !src="">
        $(document).ready(function () {
            var dt = $('#berita').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('video.data') }}',
                columns: [{
                    data: 'judul',
                    name: 'judul'
                }, {
                    data: 'embed',
                    name: 'embed'
                },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        align: 'center'
                    },
                ],
            });
            var del = function (id) {
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
                            url: "{{ route('video.index') }}/" + id,
                            method: "DELETE",
                        }).done(function (msg) {
                            console.log(msg)
                            dt.ajax.reload();
                            swal("Deleted!", "Data sudah terhapus.", "success");
                        }).fail(function (textStatus) {
                            alert("Request failed: " + textStatus);
                        });
                    },
                    function (dismiss) {
                        // dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
                        // swal("Cancelled", "Data batal dihapus", "error");
                    });
            };
            $('body').on('click', '.hapus-data', function () {
                del($(this).attr('data-id'));
            });
        });
    </script>
@endpush
