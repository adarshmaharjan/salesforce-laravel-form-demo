<x-app-layout>
    <section>
        <div class="px-8 py-4 h-screen w-screen flex flex-col items-center justify-center gap-y-4">
            <h2 class="text-3xl"> Authenticate With Salesforce first</h2>
            <a href="{{ route('verify.salesforce') }}"
                class="px-4 py-2 rounded-2xl bg-blue-400 text-center hover:text-white transition-all">Create Salesforce
                Account</a>
        </div>
    </section>

</x-app-layout>
