<x-app-layout name="title" x-data='{infoModal : true}'>
    @php
        $Alert = true;
    @endphp
    @if (session()->has('info'))
        <div class="flex bg-blue-500 max-w-sm mb-4">
            <div class="w-16 bg-teal">
                <div class="p-4">
                    <svg class="h-8 w-8 text-white fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <path
                            d="M437.019 74.981C388.667 26.629 324.38 0 256 0S123.333 26.63 74.981 74.981 0 187.62 0 256s26.629 132.667 74.981 181.019C123.332 485.371 187.62 512 256 512s132.667-26.629 181.019-74.981C485.371 388.667 512 324.38 512 256s-26.629-132.668-74.981-181.019zM256 470.636C137.65 470.636 41.364 374.35 41.364 256S137.65 41.364 256 41.364 470.636 137.65 470.636 256 374.35 470.636 256 470.636z" />
                        <path
                            d="M256 235.318c-11.422 0-20.682 9.26-20.682 20.682v94.127c0 11.423 9.26 20.682 20.682 20.682 11.423 0 20.682-9.259 20.682-20.682V256c0-11.422-9.259-20.682-20.682-20.682zM270.625 147.248A20.826 20.826 0 0 0 256 141.19a20.826 20.826 0 0 0-14.625 6.058 20.824 20.824 0 0 0-6.058 14.625 20.826 20.826 0 0 0 6.058 14.625A20.83 20.83 0 0 0 256 182.556a20.826 20.826 0 0 0 14.625-6.058 20.826 20.826 0 0 0 6.058-14.625 20.839 20.839 0 0 0-6.058-14.625z" />
                    </svg>
                </div>
            </div>
            <div class="w-auto text-grey-darker items-center p-4">
                <span class="text-lg font-bold pb-4">
                    Informasi
                </span>
                <p class="leading-tight">
                    {{ session('info') }}
                </p>
            </div>
        </div>
    @endif
    @can('Manage-Admin')
        <livewire:user.dashboard-admin>
        @endcan
        @can('Manage-Supplier')
            <livewire:user.dashboard-supplier>
            @endcan
</x-app-layout>
