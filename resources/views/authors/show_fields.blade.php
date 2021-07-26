<!-- Author Id Field -->
<div class="col-sm-12">
    {!! Form::label('author_id', 'Author Id:') !!}
    <p>{{ $author->author_id }}</p>
</div>

<!-- Alias Name Field -->
<div class="col-sm-12">
    {!! Form::label('alias_name', 'Alias Name:') !!}
    <p>{{ $author->alias_name }}</p>
</div>

<!-- Link Field -->
<div class="col-sm-12">
    {!! Form::label('link', 'Link:') !!}
    <p>{{ $author->link }}</p>
</div>

<!-- Author Group Field -->
<div class="col-sm-12">
    {!! Form::label('author_group', 'Author Group:') !!}
    <p>{{ $author->author_group }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $author->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $author->updated_at }}</p>
</div>

