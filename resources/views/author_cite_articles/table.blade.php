<div class="table-responsive">
    <table class="table" id="authorCiteArticles-table">
        <thead>
        <tr>
            <th>Author Id</th>
        <th>Cite Id</th>
        <th>Article Id</th>
        <th>By Author</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authorCiteArticles as $authorCiteArticle)
            <tr>
                <td>{{ $authorCiteArticle->author_id }}</td>
            <td>{{ $authorCiteArticle->cite_id }}</td>
            <td>{{ $authorCiteArticle->article_id }}</td>
            <td>{{ $authorCiteArticle->by_author }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['authorCiteArticles.destroy', $authorCiteArticle->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('authorCiteArticles.show', [$authorCiteArticle->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('authorCiteArticles.edit', [$authorCiteArticle->id]) }}"
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
