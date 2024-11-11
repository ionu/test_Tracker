<section class="space-y-6">
    <table border="1">
        <tr>
            <td>
                visitors
            </td>
            <td>
                date
            </td>
            <td>
                url
            </td>
        </tr>
        @foreach( $visits as $data )
            <tr>
                <td>{{$data->unique_visits}} fafa</td>
                <td>{{$data->date}}</td>
                <td>{{$data->url}}</td>
            </tr>
        @endforeach
    </table>
</section>
