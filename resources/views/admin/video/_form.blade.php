<div class="column col-md-12">
    <!-- Email input -->
    <div class="form-group">
        {{ Form::label('judul', 'Judul Video', ['class' => 'col-form-label']) }}
        {{ Form::text('judul',null,[
            'class'=>'form-control',
            'id' => 'judul',
            'required' => 'required'
        ]) }}
    </div>
    <div class="form-group">
        {{ Form::label('embed', 'Embed Video', ['class' => 'col-form-label']) }}
        {{ Form::text('embed',null,[
            'class'=>'form-control',
            'id' => 'embed',
            'required' => 'required'
        ]) }}
    </div>
</div>
