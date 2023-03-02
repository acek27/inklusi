<div class="column col-md-12">
    <!-- Email input -->
    <div class="form-group">
        {{ Form::label('nama_kegiatan', 'Nama Kegiatan', ['class' => 'col-form-label']) }}
        {{ Form::text('nama_kegiatan',null,[
            'class'=>'form-control',
            'id' => 'nama_kegiatan',
            'required' => 'required'
        ]) }}
    </div>
    <div class="form-group">
        {{ Form::label('date', 'Tanggal', ['class' => 'col-form-label']) }}
        {{ Form::text('date',null,[
            'class'=>'form-control',
            'id' => 'date',
            'required' => 'required',
            'autocomplete' => 'off'
        ]) }}
    </div>
    <div class="form-group">
        {{ Form::label('tempat', 'Tempat', ['class' => 'col-form-label']) }}
        {{ Form::text('tempat',null,[
            'class'=>'form-control',
            'id' => 'tempat',
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
      ]) }}
    </div>
</div>
