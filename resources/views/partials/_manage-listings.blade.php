<div class="relative rounded-lg">
    <div class=" top-2 right-2">
        <x-card class="bg-white border-hidden p-4">
            <form action="/">
                <label for="order" name=>Sort By</label>
                <select id="order" name="order">
                    <option value="">--Select--</option>
                    <option value="latest">Latest Listing</option>
                    <option value="oldest">Oldest Listing</option>
                </select>
                <button type="submit" id='sort-btn'>Sort</button>
            </form>
        </x-card>
    </div>
</div>