@extends('app')

@include('navbar')

@section('content')
<div class="min-h-full" x-data="{ createModal: false, updateModal: false, item: {judul_buku: '', tahun_terbit: '', pengarang: '', harga: ''}, deleteId: '' ,
    setItem(item) {
        this.item = {
            id: item.id,
            judul_buku: item.judul_buku,
            tahun_terbit: item.tahun_terbit,
            pengarang: item.pengarang,
            harga: item.harga
        };
        this.updateModal = true;
    },
    setDeleteId(id) {
        this.deleteId = id;
        this.deleteModal = true;
    }
}">
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div>
                <button @click="createModal = !createModal" class="block rounded-sm mb-2 bg-indigo-600 focus:outline-none px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">Tambah Buku</button>
                <button onclick="location.href='{{ route('export') }}'" class="block rounded-sm bg-indigo-600 focus:outline-none px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">Export</button>
            </div>
            <div>
                    {!! $chart->renderHtml() !!}
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="text-left">
                    <tr>
                    <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Judul Buku</th>
                    <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Tahun Terbit</th>
                    <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Pengarang</th>
                    <th class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">Harga</th>
                    <th class="px-4 py-2"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ( $buku as $item)
                    <tr>
                        <td class="px-4 py-2 font-medium whitespace-nowrap text-gray-900">{{ $item->judul_buku }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700" >{{ $item->tahun_terbit }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700" >{{ $item->pengarang }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-gray-700" >Rp. {{ number_format($item->harga, 0) }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <a
                            href="#" @click="setItem({{ json_encode($item) }})"
                            class="inline-block rounded-sm bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
                            >
                            Edit
                            </a>
                            <a
                            href="#" @click="setDeleteId({{ $item->id }})"
                            class="inline-block rounded-sm bg-red-600 px-4 py-2 text-xs font-medium text-white hover:bg-red-700"
                            >
                            Delete
                            </a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            

            </div>

            @include('create_modal')

            @include('update_ modal')

            @include('delete_modal')

        </div>
    </main>
</div>

@endsection


@section('javascript')
    {!! $chart->renderChartJsLibrary() !!}
    {!! $chart->renderJs() !!}
@endsection
    


