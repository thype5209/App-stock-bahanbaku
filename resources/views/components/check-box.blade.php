<div x-show="{{ $statusModal }}" x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <!-- Modal -->
    <div x-show="{{ $statusModal }}" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal()"
        @keydown.escape="closeModal"
        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg    sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog"
        id="modal">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
            <button wire:click='closeModal()'
                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded    hover: hover:text-gray-700"
                aria-label="close">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header>
        <!-- Modal body -->
        <div class="mt-4 mb-6 text-center">
            <!-- Modal title -->
            <p class="mb-2 text-lg font-semibold text-gray-700   ">
                Pemberitahuan
            </p>
            <!-- Modal description -->
            <p class="text-sm text-gray-700  flex justify-center items-center ">
                @if ($status == 'Selesai')
                    <a href="#_"
                        class="inline-block px-5 py-2 mx-auto text-white bg-blue-600 rounded-full hover:bg-blue-700 md:mx-0">
                        Bahan Baku Sudah Di Masukkan Ke Dalam Stock {{ $bahan }}
                    </a>
                @endif
                @if ($status == 'Konfirmasi')
                    <a href="#_" wire:click='ChangeYes({{ $itemID }})'
                        class="inline-block px-5 py-2 mx-auto text-white bg-blue-600 rounded-full hover:bg-blue-700 md:mx-0">
                        Masukkan Ke Dalam Stock Bahan Baku {{ $bahan }}
                    </a>
                @endif
                @if ($status == 'Belum Konfirmasi')
                    <a href="#_"
                        class="inline-block px-5 py-2 mx-auto text-white bg-blue-600 rounded-full hover:bg-blue-700 md:mx-0">
                        Konfirmasi Pemesanan Bahan Baku {{ $bahan }}
                    </a>
                @endif
            </p>
        </div>
        <x-button type="button" wire:click='closeModal()' class="w-full bg-red-500 text-white">Tutup</x-button>
    </div>
</div>
