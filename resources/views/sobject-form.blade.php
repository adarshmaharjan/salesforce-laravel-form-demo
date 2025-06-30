<x-app-layout>
    <section>
        <h2 class="text-center text-3xl py-4">Fill the form t create the Salesforce Account Object</h2>
        <form action="{{ route('create-account') }}" method="post">
            @csrf
            <div class="flex flex-col justify-center items-center">
                <div class="flex w-1/2 py-4 px-8">
                    {{-- Account Name --}}
                    <div class="flex flex-col gap-2 w-full ">
                        <label for="address" class="text-lg">Account Name</label>
                        <input type="text" name="account-name"
                            class="border focus:border-none rounded-md px-4 py-2 inline-block w-full"
                            :value="old("account-name")">
                    </div>
                </div>
                <button type="submit"
                    class="px-4 py-2 rounded-md bg-green-400 hover:cursor-pointer hover:text-white transition-all">Submit</button>
            </div>
        </form>
</x-app-layout>
