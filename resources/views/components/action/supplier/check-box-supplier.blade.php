<div x-data="{ open: {{ isset($statusModal) && $statusModal ? 'true' : 'false' }}, working: false }" x-cloak wire:key="edit-{{ $itemID }}">
    <div x-show="open"
        class="fixed z-50 bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div x-show="open" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative bg-gray-100 rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6">
            <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                <button @click="open = false" type="button"
                    class="text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="w-full">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ __('Edit Status') }} {{ $kode }}
                    </h3>
                    <div class="mt-2 block">
                        Apakah Anda Ingin Mengubah Status Pemesanan?
                        <div>
                            @if ($status == 'Selesai' || $status == 'Konfirmasi')
                                Barang Sudah Di Selesai
                            @elseif($status == 'Belum Konfirmasi')
                                @can('Manage-Supplier')
                                    <div class="w-full flex justify-center">
                                        <img src="{{ asset('bukti/' . $image) }}" width="100" alt="">
                                    </div>
                                    @if ($table == 'BarangMasuk')
                                        <button type="button" x-on:click="open = false" x-bind:disabled="working"
                                            wire:click='ChangeToKonfirmasi({{ $itemID }})'
                                            wire:loading.attr='disabled'
                                            class="inline-block px-5 py-2 mx-auto text-white bg-blue-600 rounded-full hover:bg-blue-700 md:mx-0">
                                            {{ __('Konfirmasi Pemesanan') }}
                                        </button>
                                    @elseif($table == 'BarangMasukAir')
                                    <button type="button" x-on:click="open = false" x-bind:disabled="working"
                                        wire:click='ChangeToKonfirmasiAir({{ $itemID }})'
                                        wire:loading.attr='disabled'
                                        class="inline-block px-5 py-2 mx-auto text-white bg-blue-600 rounded-full hover:bg-blue-700 md:mx-0">
                                        {{ __('Konfirmasi Pemesanan') }}
                                    </button>
                                    @endif

                                @endcan
                            @endif
                        </div>
                        <div class="mt-10 flex justify-center">
                            <span class="mr-2">
                                <button wire:click='closeModal()' wire:disabled="working"
                                    class="w-32 shadow-sm inline-flex justify-center items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-teal active:bg-gray-700 transition ease-in-out duration-150">
                                    {{ __('Batalkan') }}
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
