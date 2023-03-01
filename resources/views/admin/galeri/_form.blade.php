<div class="column col-md-12">
    <!-- Email input -->
    <div class="form-group">
        {{ Form::label('nama_kegiatan', 'Nama Kegiatan', ['class' => 'col-form-label']) }}
        {{ Form::text('nama_kegiatan',null,[
            'class'=>'form-control',
            'id' => 'nama_kegiatan',
            'required' => 'required',
            'autocomplete' => 'off'
        ]) }}
    </div>
    <div class="row">
        <div class="column col-md-6">
            <div class="form-group">
                {{ Form::label('date', 'Tanggal', ['class' => 'col-form-label']) }}
                {{ Form::text('date',null,[
                    'class'=>'form-control',
                    'id' => 'date',
                    'required' => 'required',
                    'autocomplete' => 'off'
                ]) }}
            </div>
        </div>
        <div class="column col-md-6">
            <div class="form-group">
                {{ Form::label('tempat', 'Tempat', ['class' => 'col-form-label']) }}
                {{ Form::text('tempat',null,[
                    'class'=>'form-control',
                    'id' => 'tempat',
                    'required' => 'required',
                    'autocomplete' => 'off'
                ]) }}
            </div>
        </div>
    </div>
</div>
