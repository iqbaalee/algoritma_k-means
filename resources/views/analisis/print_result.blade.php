<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Analisis</title>
</head>

<body onload="window.print()">
    <h2 align="center">Hasil Analisis</h2>
    <table id="cluster1" border="1px" style="border-collapse:collapse">
        <thead>
            <tr>

                </th>
                <th width=25%>NIM</th>
                <th width=75%>Nama</th>
                <th width=75%>Angkatan</th>
                <th width=25%>Cluster</th>

            </tr>
        </thead>
        <tbody>
            @foreach($response->data as $data)
            <tr>
                <td>{{$data->nim}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->angkatan}}</td>
                <td>{{$data->cluster}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
