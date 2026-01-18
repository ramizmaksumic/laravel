@extends('welcome')

@section('content')

<div class="mt-20">
    <form action="{{ route('shipments.store') }}" method="POST" class="mx-auto max-w-3xl space-y-6">
        @csrf

        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
            <h2 class="text-xl font-semibold text-gray-900">Create Shipment</h2>
            <p class="mt-1 text-sm text-gray-600">Unesite podatke o pošiljci.</p>

            {{-- Title --}}
            <div class="mt-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    required
                    class="mt-2 block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                           placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
                           @error('title') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror"
                    placeholder="npr. Express delivery package">
                @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- From / To --}}
            <div class="mt-6 grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="from_city" class="block text-sm font-medium text-gray-700">From City</label>
                    <input
                        type="text"
                        name="from_city"
                        id="from_city"
                        value="{{ old('from_city') }}"
                        required
                        class="mt-2 block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                               placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
                               @error('from_city') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror"
                        placeholder="npr. Sarajevo">
                    @error('from_city')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="from_country" class="block text-sm font-medium text-gray-700">From Country</label>
                    <input
                        type="text"
                        name="from_country"
                        id="from_country"
                        value="{{ old('from_country') }}"
                        required
                        class="mt-2 block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                               placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
                               @error('from_country') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror"
                        placeholder="npr. Bosnia and Herzegovina">
                    @error('from_country')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="to_city" class="block text-sm font-medium text-gray-700">To City</label>
                    <input
                        type="text"
                        name="to_city"
                        id="to_city"
                        value="{{ old('to_city') }}"
                        required
                        class="mt-2 block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                               placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
                               @error('to_city') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror"
                        placeholder="npr. Mostar">
                    @error('to_city')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="to_country" class="block text-sm font-medium text-gray-700">To Country</label>
                    <input
                        type="text"
                        name="to_country"
                        id="to_country"
                        value="{{ old('to_country') }}"
                        required
                        class="mt-2 block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                               placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
                               @error('to_country') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror"
                        placeholder="npr. Bosnia and Herzegovina">
                    @error('to_country')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Price / Status / User --}}
            <div class="mt-6 grid gap-6 sm:grid-cols-3">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <div class="relative mt-2">
                        <input
                            type="number"
                            name="price"
                            id="price"
                            value="{{ old('price') }}"
                            required
                            min="0"
                            step="1"
                            class="block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 pr-14 text-gray-900 shadow-sm
                                   placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
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

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select
                        name="status"
                        id="status"
                        required
                        class="mt-2 block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                               focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
                               @error('status') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror">
                        <option value="">Select status</option>
                        <option value="pending" @selected(old('status')==='pending' )>Pending</option>
                        <option value="in_transit" @selected(old('status')==='in_transit' )>In transit</option>
                        <option value="delivered" @selected(old('status')==='delivered' )>Delivered</option>
                        <option value="cancelled" @selected(old('status')==='cancelled' )>Cancelled</option>
                    </select>
                    @error('status')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                    <select
                        name="user_id"
                        id="user_id"
                        required
                        class="mt-2 block w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                               focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
                               @error('user_id') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror">
                        <option value="">Select user</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" @selected(old('user_id')==$user->id)>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Details --}}
            <div class="mt-6">
                <label for="details" class="block text-sm font-medium text-gray-700">Details</label>
                <textarea
                    name="details"
                    id="details"
                    rows="5"
                    class="mt-2 block w-full resize-none rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-900 shadow-sm
                           placeholder:text-gray-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/20
                           @error('details') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror"
                    placeholder="Dodatne informacije o pošiljci...">{{ old('details') }}</textarea>

                @error('details')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="mt-8 flex items-center justify-end gap-3">
                <a
                    href="{{ route('shipments.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-gray-300 bg-white px-5 py-3 text-sm font-semibold text-gray-700 shadow-sm
                           transition hover:bg-gray-50">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm
                           transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/30">
                    Create Shipment
                </button>
            </div>
        </div>
    </form>

</div>


@endsection