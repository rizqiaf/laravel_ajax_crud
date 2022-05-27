@extends('layouts.main')

@section('container')
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
                    <button type="submit" class="uk-button uk-button-default" onclick="store()">Simpan</button>
                </div>
        
            </fieldset>
        </form>
    </div>
</div>
@endsection