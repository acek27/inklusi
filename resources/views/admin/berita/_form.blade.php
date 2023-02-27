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
      ]) }}
    </div>
</div>
