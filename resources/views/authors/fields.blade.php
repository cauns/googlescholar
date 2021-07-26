@csrf
<div class="form-group">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        {{ Form::label('author_id', 'Author Id') }}
        {{ Form::text('author_id',null,['class'=>"form-control ",'placeholder'=>'please enter author id']) }}
        @error('title')
        <div class="valid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
