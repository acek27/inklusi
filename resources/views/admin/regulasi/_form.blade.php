<div class="column col-md-12">
    <!-- Email input -->
    <div class="form-group">
        {{ Form::label('judul', 'Judul Regulasi', ['class' => 'col-form-label']) }}
        {{ Form::text('judul',null,[
            'class'=>'form-control',
            'id' => 'judul',
            'required' => 'required'
        ]) }}
    </div>
    <div class="row">
        <div class="column col-md-6">
            <div class="form-group">
                {{ Form::label('nomor', 'Nomor', ['class' => 'col-form-label']) }}
                {{ Form::text('nomor',null,[
                    'class'=>'form-control',
                    'id' => 'nomor',
                    'required' => 'required'
                ]) }}
            </div>
        </div>
        <div class="column col-md-6">
            <div class="form-group">
                {{ Form::label('tahun', 'Tahun', ['class' => 'col-form-label']) }}
                {{ Form::number('tahun',null,[
                    'class'=>'form-control',
                    'id' => 'tahun',
                    'required' => 'required'
                ]) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('jenis', 'Jenis Regulasi', ['class' => 'col-form-label']) }}
        {{ Form::select('jenis_id', $jenis,null,[
                   'class'=>'form-control select2',
                   'id' => 'jenis_id',
                   'placeholder' => '-- Pilih Kategori --',
                   'required' => 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('path', 'File Regulasi', ['class' => 'col-form-label']) }}
        {{ Form::file('path', [
          'class' => 'form-control dropify',
          'id' => 'path',
          'data-allowed-file-extensions' => 'pdf',
      ]) }}
    </div>
</div>
