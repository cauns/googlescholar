<!-- Author Id Field -->
<div class="col-sm-12">
    {!! Form::label('author_id', 'Author Id:') !!}
    <p>{{ $authorCiteArticle->author_id }}</p>
</div>

<!-- Cite Id Field -->
<div class="col-sm-12">
    {!! Form::label('cite_id', 'Cite Id:') !!}
    <p>{{ $authorCiteArticle->cite_id }}</p>
</div>

<!-- Article Id Field -->
<div class="col-sm-12">
    {!! Form::label('article_id', 'Article Id:') !!}
    <p>{{ $authorCiteArticle->article_id }}</p>
</div>

<!-- By Author Field -->
<div class="col-sm-12">
    {!! Form::label('by_author', 'By Author:') !!}
    <p>{{ $authorCiteArticle->by_author }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $authorCiteArticle->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $authorCiteArticle->updated_at }}</p>
</div>

