<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<table>
    <thead>
    <tr>
        <th>content</th>
        <th>author alias</th>
        <th>total</th>
        <th>total only author</th>
        <th>total not by author</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
        <tr>
            <td>
                <p>{{ $item->title }}</p>
                <p>{{ $item->author }}</p>
                <p>{{ $item->sub_title }}</p>
            </td>
            <td>{{ $item->alias_name }}</td>
            <td>{{ $item->x_total }}</td>
            <td>{{ $item->x_total_only_author }}</td>
            <td>{{ $item->x_total_not_by_author }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</html>