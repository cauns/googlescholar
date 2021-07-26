<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Only Author Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_only_author', 'Total Only Author:') !!}
    {!! Form::number('total_only_author', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Not By Author Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_not_by_author', 'Total Not By Author:') !!}
    {!! Form::number('total_not_by_author', null, ['class' => 'form-control']) !!}
</div>