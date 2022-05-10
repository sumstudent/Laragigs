<form action="/" name="sort" method="POST">
    <div class="relative rounded-lg">
        <div class=" top-2 right-2">
            <x-card class="bg-white border-hidden p-4">
                Tags:
                <select name="tag">
                    @foreach ($listings as $listing)
                    <option value="tag">{{$listing->tags}}</option>
                    @endforeach
                </select>
            </x-card>
        </div>
    </div>
</form>