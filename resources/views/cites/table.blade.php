<div class="table-responsive">
    <table class="table" id="cites-table">
        <thead>
        <tr>
            <th>Cite Id</th>
        <th>Total</th>
        <th>Total Only Author</th>
        <th>Total Not By Author</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cites as $cite)
            <tr>
                <td>{{ $cite->cite_id }}</td>
            <td>{{ $cite->total }}</td>
            <td>{{ $cite->total_only_author }}</td>
            <td>{{ $cite->total_not_by_author }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cites.destroy', $cite->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cites.show', [$cite->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cites.edit', [$cite->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
