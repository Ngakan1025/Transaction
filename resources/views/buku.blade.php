<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Daftar Buku</h1>
    </div>

    <div class="container mt-3">
        <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1">
            <div class="grid grid-cols-12">
                <div class="col-span-6 p-4">
                    <a href="{{route('buku.create')}}"><button
                            class="px-4 py-1 text-sm rounded text-purple-600 font-semibold border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none">Tambah</button></a>
                </div>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg m-3">
                <table class="table">
                    <thead class="bg-gray-50">
                        <tr class="text-lg text-left">
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penuis</th>
                            <th>Penerbit</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $no=1; ?>
                        @foreach ($buku as $item)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->penulis}}</td>
                            <td>{{$item->penerbit}}</td>
                            <td>{{$item->kategori->kategori}}</td>
                            <td>
                                <form action="{{route('buku.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('buku.edit', $item->id)}}" class="btn btn-info">Edit</a>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>