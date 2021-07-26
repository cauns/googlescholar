<!-- Cite Id Field -->
<div class="col-sm-12">
    {!! Form::label('cite_id', 'Cite Id:') !!}
    <p>{{ $cite->cite_id }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $cite->total }}</p>
</div>

<!-- Total Only Author Field -->
<div class="col-sm-12">
    {!! Form::label('total_only_author', 'Total Only Author:') !!}
    <p>{{ $cite->total_only_author }}</p>
</div>

<!-- Total Not By Author Field -->
<div class="col-sm-12">
    {!! Form::label('total_not_by_author', 'Total Not By Author:') !!}
    <p>{{ $cite->total_not_by_author }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cite->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cite->updated_at }}</p>
</div>

