<x-app-layout>
    <section class="p-8 flex justify-center item-center">
        <div class="w-1/3">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold">Latest Accounts</h2>
                <a href="{{ route('create-account') }}"
                    class="bg-blue-300 px-2 py-1 rounded-sm hover:text-white transition-all">Create
                    New Account</a>
            </div>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700 mt-4 flex flex-col gap-y-3">
                @foreach ($data['records'] as $record)
                    <li class="pb-3 sm:pb-4">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="shrink-0">
                                <a href="/salesforce/account/{{ $record['Id'] }}" class="">
                                    <div class="w-10 h-10 bg-blue-200 rounded-full flex justify-center items-center ">
                                        {{ Str::upper(substr($record['Name'], 0, 1)) }}
                                </a>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">

                            <a href="/salesforce/account/{{ $record['Id'] }}"
                                class="hover:text-blue-100 transition-all">

                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">

                                    {{ $record['Name'] }}
                                </p>
                            </a>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $record['Phone'] }}
                            </p>
                        </div>

                        {{-- ${{ $record['AnnualRevenue'] }} --}}
                        <a href="{{ route('delete-account', [
                            'id' => $record['Id'],
                        ]) }}"
                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white px-2 py-1 bg-red-200 rounded-sm">Delete</a>



        </div>
        </li>
        {{-- </a> --}}
        @endforeach


        </ul>
        </div>

    </section>

</x-app-layout>
