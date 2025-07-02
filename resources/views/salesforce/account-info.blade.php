<x-app-layout>
    <section>

        <form action="#" method="post">
            @csrf
            <div class="flex flex-col justify-center items-center">
                <div class="w-1/2 px-8 ">
                    <div class="flex justify-between items-center">
                        <h2 class="text-center text-3xl py-4">Details fo the account</h2>
                        <a href="{{ route('edit-account', ['id' => $account['Id']]) }}"
                            class="px-4 py-2 bg-blue-300 rounded-sm hover:text-white transition-all">Edit Account</a>
                    </div>
                    {{-- Account Information  --}}
                    <div class="">
                        <div class="text-2xl mb-4">Account Information</div>
                        <div class="grid grid-cols-2 gap-y-2 gap-x-4">
                            <div class="flex flex-col gap-1 w-full">
                                <label for="address" class="text-md">Account Name</label>
                                <input type="text" name="account-name"
                                    class="border rounded-md px-3 py-2 inline-block w-full"
                                    value="{{ old('account-name', $account['Name'] ?? '') }}" disabled>
                                @error('account-name')
                                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-1 w-full">
                                <label for="address" class="text-md">Phone</label>
                                <input type="text" name="phone"
                                    class="border rounded-md px-3 py-2 inline-block w-full"
                                    value="{{ old('phone', $account['Phone'] ?? '') }}" disabled>
                                @error('phone')
                                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1"> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-1 w-full">
                                <label for="address" class="text-md">Account Number</label>
                                <input type="text" name="account-number"
                                    class="border rounded-md px-3 py-2 inline-block w-full"
                                    value="{{ old('account-number', $account['AccountNumber'] ?? '') }}" disabled>
                                @error('account-number')
                                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1"> {{ $message }}</div>
                                @enderror
                            </div>


                            <div class="flex flex-col gap-1 w-full">
                                <label for="address" class="text-md">Fax</label>
                                <input type="text" name="fax"
                                    class="border rounded-md px-3 py-2 inline-block w-full"
                                    value="{{ old('fax', $account['Fax'] ?? '') }}" disabled>
                                @error('fax')
                                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1"> {{ $message }}</div>
                                @enderror
                            </div>


                            <div class="flex flex-col gap-1 w-full">
                                <label for="address" class="text-md">Website</label>
                                <input type="text" name="website"
                                    class="border rounded-md px-3 py-2 inline-block w-full"
                                    value="{{ old('website', $account['Website'] ?? '') }}" disabled>
                                @error('website')
                                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1"> {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-1 w-full">
                                <label for="address" class="text-md">Account Site</label>
                                <input type="text" name="account-site"
                                    class="border rounded-md px-3 py-2 inline-block w-full"
                                    value="{{ old('account-site', $account['Site'] ?? '') }}" disabled>
                                @error('account-site')
                                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1"> {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-1 w-full">
                                <label for="address" class="text-md">Ticker Symbol</label>
                                <input type="text" name="ticker-symbol"
                                    class="border rounded-md px-3 py-2 inline-block w-full"
                                    value="{{ old('ticker-symbol', $account['TickerSymbol'] ?? '') }}" disabled>
                                @error('ticker-symbol')
                                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1"> {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-1 w-full">
                                <label for="address" class="text-md">Employees</label>
                                <input type="text" name="employees"
                                    class="border rounded-md px-3 py-2 inline-block w-full"
                                    value="{{ old('employees', $account['NumberOfEmployees']) ?? '' }}" disabled>
                                @error('employees')
                                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1"> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-1 w-full">
                                <label for="address" class="text-md">Annual Revenue($)</label>
                                <input type="text" name="annual-revenue"
                                    class="border rounded-md px-3 py-2 inline-block w-full"
                                    value="{{ old('annual-revenue', $account['AnnualRevenue'] ?? '') }}">
                                @error('annual-revenue')
                                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1"> {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-1 w-full">
                                <label for="address" class="text-md">SIC code</label>
                                <input type="text" name="sic-code"
                                    class="border rounded-md px-3 py-2 inline-block w-full"
                                    value="{{ old('sic-code', $account['Sic']) ?? '' }}">
                                @error('sic-code')
                                    <div class="text-sm text-red-600 dark:text-red-400 space-y-1"> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <button type="submit"
                    class="px-4 py-2 mt-4 rounded-md bg-green-400 hover:cursor-pointer hover:text-white transition-all">Submit</button> --}}
            </div>
        </form>
</x-app-layout>
