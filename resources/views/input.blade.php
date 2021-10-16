<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Tambah Buku</h1>
    </div>

    <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1">
        <form action="{{(isset($buku))?route('buku.update', $buku->id):route('buku.store')}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($buku))
            @method('PATCH')
            @endif
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Judul
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="judul" value="{{(isset($buku))?$buku->judul:old('judul')}}"
                                    class="@error('judul') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="Judul buku">
                            </div>
                            <div class="text-xs text-red-600">@error('judul') {{$message}} @enderror</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Penulis
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="penulis"
                                    value="{{(isset($buku))?$buku->penulis:old('penulis')}}"
                                    class="@error('penulis') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="masukan nama penulis">
                            </div>
                            <div class="text-xs text-red-600">@error('penulis') {{$message}} @enderror</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Penerbit
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="penerbit"
                                    value="{{(isset($buku))?$buku->penerbit:old('penerbit')}}"
                                    class="@error('penerbit') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="masukan nama penerbit">
                            </div>
                            <div class="text-xs text-red-600">@error('penerbit') {{$message}} @enderror</div>
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select class="form-control select2" style="width : 100%" name="kategori_id" id="kategori_id">
                            <option disabled value="">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <a href="{{ route('buku.index') }}"><button class="btn btn-warning">Kembali</button></a>
                </div>
            </div>
        </form>
    </div>

    </div>
</body>

</html>