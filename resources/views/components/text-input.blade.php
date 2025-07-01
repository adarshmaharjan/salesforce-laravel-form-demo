@props(['label', 'name'])
<div class="flex flex-col gap-1 w-full">
    {{-- <label for="address" class="text-lg">{{ $value }}</label> --}}
    {{-- <input type="text" name="{{ $name }}" class="border rounded-md px-4 py-2 inline-block w-full"> --}}

    <label for="address" class="text-md">{{ $label }}</label>
    <input type="text" name="{{ $name }}" class="border rounded-md px-3 py-2 inline-block w-full"
        value="{{ old($name, '') }}">

    {{-- @if ($error_message)
        <div class="text-sm text-red-600 dark:text-red-400 space-y-1">
            {{ $error_message }}
        </div>
    @endif --}}
    </ul>
</div>
