<x-app-layout>
    <section>

        <form action="{{ route('create-account') }}" method="post">
            @csrf
            <div class="flex flex-col justify-center items-center">
                <h2 class="text-center text-3xl py-4">Fill the form the create the Salesforce Account Object</h2>
                {{-- Account Information  --}}
                <div class="w-1/2 px-8 ">
                    <div class="text-2xl mb-4">Account Information</div>
                    <div class="grid grid-cols-2 gap-y-2 gap-x-4">

                        <x-text-input name="account-name" label="Account Name" />
                        <x-text-input name="phone" label="Phone" />
                        <x-text-input name="fax" label="Fax" />
                        <x-text-input name="account-number" label="Account Number" />

                        <x-text-input name="website" label="Website" />
                        <x-text-input name="account-site" label="Account Site" />
                        <x-text-input name="ticker-symbol" label="Ticker Symbol" />

                        <x-text-input name="employees" label="Employees" />
                        <x-text-input name="annual-revenue" label="Annual Revenue" />
                        <x-text-input name="sic-code" label="SIC Code" />

                        {{-- Need extra data  --}}

                        {{-- <x-text-input name="account-owner" label="Account Owner" /> --}}
                        {{-- <x-text-input name="rating" label="Rating" /> --}}
                        {{-- <x-text-input name="parent-account" label="Parent Account" /> --}}
                        {{-- <x-text-input name="type" label="Type" /> --}}
                        {{-- <x-text-input name="ownership" label="Ownership" /> --}}
                        {{-- <x-text-input name="industry" label="Industry" /> --}}

                    </div>
                </div>

                <button type="submit"
                    class="px-4 py-2 mt-4 rounded-md bg-green-400 hover:cursor-pointer hover:text-white transition-all">Submit</button>
            </div>
        </form>
</x-app-layout>
