<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Gigs
            </h1>
        </header>
        {{-- supposedly dapat there are two manage blades for admin and user, however i cannot figure out kung papan ko i i-implement --}}
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @if ($listings->isEmpty())
               
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">
                            No Listings Found
                        </p>
                    </td>
                </tr>
                @endif

                @foreach ($listings as $listing)
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/listings/{{$listing->id}}">
                            {{$listing->title}}
                        </a>
                    </td>
                    @if (auth()->user()->is_admin)
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <a href="/listings/{{$listing->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                class="fa-solid fa-pen-to-square"></i>
                            Edit</a>
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <form method="POST" action="/listings/{{$listing->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500">
                                <i class="fa-solid fa-trash">Delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach

            </tbody>
        </table>
    </x-card>

</x-layout>