<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset("assets/uikit/css/")}}/uikit.min.css" />
        

        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/css/uikit.min.css" />

        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit-icons.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        
    </head>
    <body>
        <div class="uk-container">
            <h2>Hello</h2>
            <button class="uk-button uk-button-default uk-margin-small-right" uk-toggle="target: #modal-example" type="button" id="addnewstaff">Tambah</button>
            <table class="uk-table uk-table-justify uk-table-divider">
                <caption>Table Caption</caption>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nik</th>
                            <th>Jabatan</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $staff->nama }}</td>
                        <td>{{ $staff->nik }}</td>
                        <td>{{ $staff->jabatan }}</td>
                        <td>{{ $staff->alamat }}</td>
                        <td>{{ $staff->no_tlp }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>
                            <a href="javascript:void(0)" class="uk-button uk-button-default edit" data-id="{{ $staff->id }}">Edit</a>
                            <a href="javascript:void(0)" class="uk-button uk-button-default delete" data-id="{{ $staff->id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach  
                </tbody>
            </table>
            {!! $staffs->links() !!}
        </div>

        <!--Form Modal -->
        <div id="modal-example" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <form action="javascript:void(0)" id="addEditStaffForm" name="addEditStaffForm" method="POST">
                    <input type="hidden" name="id" id="id">
                    <fieldset class="uk-fieldset">
                
                        <legend class="uk-legend">Masukan Data Karyawan Baru</legend>
                
                        <div class="uk-margin">
                            <input class="uk-input" type="text" id="nama" placeholder="Nama">
                        </div>

                        <div class="uk-margin">
                            <input class="uk-input" type="text" id="nik" placeholder="Nik">
                        </div>

                        <div class="uk-margin">
                            <input class="uk-input" type="text" id="jabatan" placeholder="Jabaatan">
                        </div>

                        <div class="uk-margin">
                            <input class="uk-input" type="text" id="alamat" placeholder="Alamat">
                        </div>

                        <div class="uk-margin">
                            <input class="uk-input" type="text" id="no_tlp" placeholder="Nomor Telepon">
                        </div>

                        <div class="uk-margin">
                            <input class="uk-input" type="text" id="email" placeholder="Email">
                        </div>
                

                        <div class="uk-margin">
                            <button type="submit" class="uk-button uk-button-default" value="addnewstaff" onclick="store()">Simpan</button>
                        </div>
                
                    </fieldset>
                </form>
            </div>
        </div>
        <script type="text/javascript">
                $(document).ready(function($){

                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    
                    $('#addnewstaff').click(function)() {
                        $("#modal-example").modal('show');
                    }

                    function store() {

                        var id = $("#id").val();
                        var nama = $("#nama").val();
                        var nik = $("#nik").val();
                        var jabatan = $("#jabatan").val();
                        var alamat = $("#alamat").val();
                        var no_tlp = $("#no_tlp").val();
                        var email = $("#email").val();

                        $("#btn-save").html('Please Wait...');
                        $("#btn-save"). attr("disabled", true);

                        // ajax
                        $.ajax({
                            type:"POST",
                            url: "{{ url('add-update-staff') }}",
                            data: {
                                id:id,
                                nama:nama,
                                nik:nik,
                                jabatan:jabatan,
                                alamat:alamat,
                                no_tlp:no_tlp,
                                email:email,
                        },
                        dataType: 'json',
                        success: function(res){
                        window.location.reload();
                        $("#btn-save").html('Submit');
                        $("#btn-save"). attr("disabled", false);
                        }
                        });

                        };
                });

                $('body').on('click', '.edit', function(){
                    var id = $(this).data('id');

                    $.ajax({
                        type: "POST",
                        url: "{{ url('edit-staff') }}",
                        data: { id: id },
                        dataType: 'json',
                        success: function(res){
                            $('#modal-example').modal('show');
                            $('#id').val(res.id);
                            $('#nama').val(res.nama);
                            $('#nama').val(res.nik);
                            $('#nama').val(res.jabatan);
                            $('#nama').val(res.alamat);
                            $('#nama').val(res.no_tlp);
                            $('#nama').val(res.email);
                            

                        }
                    });
                });

                $('body').on('click', '.delete', function () {

                    if (confirm("Delete Record?") == true) {
                    var id = $(this).data('id');
                    
                    // ajax
                        $.ajax({
                            type:"POST",
                            url: "{{ url('delete-staff') }}",
                            data: { id: id },
                            dataType: 'json',
                            success: function(res){

                            window.location.reload();
                            }
                        });
                    }

                });

                


        </script>
    </body>
</html>