<form action="/" name="sort" method="POST">
    <div class="relative rounded-lg">
        <div class=" top-2 right-2">
            <x-card class="bg-white border-hidden p-4">
                Sort By:
                <select name="order">
                    <option value="latest">Latest Listing</option>
                    <option value="oldest">Oldest Listing</option>

                </select>
            </x-card>
        </div>
    </div>
</form>