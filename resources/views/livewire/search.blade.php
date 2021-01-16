<div class="relative">
    <input type="text" class="form-input" placeholder="Search Contacts..." wire:model="search"/>

    <div wire:loading class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
        <div class="list-item">Searching...</div>
    </div>

    @if(!empty($search))
        <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="reset"></div>
        <div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
            @if(!empty($results))
                @foreach($results as $result)
                    <img src="{{$result['image']['path'] ? $result['image']['path'] : 'http://www.gravatar.com/avatar/3b3be63a4c2a439b013787725dfce802?d=identicon'}}"  class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <a href="{{route('account.show',$result['id'])}}" class="list-item">
                        {{ $result['user_name'] }}
                    </a>
                @endforeach
            @else
                <div class="list-item">No results!</div>
            @endif
        </div>
    @endif
</div>
