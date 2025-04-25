<div x-show="updateModal" class="fixed inset-0 bg-gray-500/75 transition-opacity"></div>
<!-- Update modal -->
<div id="updateProductModal" x-show="updateModal" tabindex="-1" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                <h3 class="text-lg font-semibold text-gray-900 ">Update Product</h3>
                <button type="button" @click="updateModal = false" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="updateProductModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="POST" action="{{ route('update') }}">
                @csrf
                <input type="hidden" name="id" x-model="item.id">
                <div class="p-4 pb-1">
                    <label for="judul_buku" class="block mb-2 text-sm font-medium text-gray-900">Judul Buku</label>
                    <input type="text" id="judul_buku" name="judul_buku" x-model="item.judul_buku" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="p-4 pb-1">
                    <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900">Tahun Terbit</label>
                    <input type="number" min="1900" max="2099" step="1" x-model="item.tahun_terbit" id="tahun_terbit" name="tahun_terbit" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="p-4 pb-1">
                    <label for="pengarang" class="block mb-2 text-sm font-medium text-gray-900">Pengarang</label>
                    <input type="text" id="pengarang" name="pengarang" x-model="item.pengarang" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="p-4">
                    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                    <input type="number" id="harga" name="harga" x-model="item.harga" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update product</button>
                </div>
            </form>
        </div>
    </div>
</div>