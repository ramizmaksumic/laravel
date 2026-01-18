<form action="{{ route('products.store') }}" method="POST" class="space-y-6">
    @csrf

    {{-- Name --}}
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">
            Naziv
        </label>

        <div class="mt-2">
            <input
                type="text"
                id="name"
                name="name"
                maxlength="64"
                value="{{ old('name') }}"
                required
                class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                       placeholder:text-gray-400
                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
                       @error('name') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror"
                placeholder="Unesite naziv proizvoda">
        </div>

        @error('name')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Description --}}
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">
            Opis
        </label>

        <div class="mt-2">
            <textarea
                id="description"
                name="description"
                rows="5"
                required
                class="block w-full resize-none rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                       placeholder:text-gray-400
                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
                       @error('description') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror"
                placeholder="Kratak opis proizvoda...">{{ old('description') }}</textarea>
        </div>

        @error('description')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Price --}}
    <div>
        <label for="price" class="block text-sm font-medium text-gray-700">
            Cijena
        </label>

        <div class="mt-2 relative">
            <input
                type="number"
                id="price"
                name="price"
                value="{{ old('price') }}"
                required
                min="0"
                step="1"
                class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 pr-16 text-gray-900 shadow-sm
                       placeholder:text-gray-400
                       focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
                       @error('price') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror"
                placeholder="0">

            <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-sm text-gray-500">
                KM
            </span>
        </div>

        @error('price')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Submit --}}
    <div class="pt-2">
        <button
            type="submit"
            class="inline-flex w-full items-center justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm
                   transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/30">
            Spremi
        </button>
    </div>

</form>