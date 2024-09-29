<div class="filter-bar d-flex flex-wrap align-items-center">
    <div class="sorting">
        <input 
            type="text" 
            wire:model.live="search_state" 
            placeholder="Search states..." 
            class="form-control"
            wire:keydown.enter="selectState(search_state)"  
        />
        @if($dropdownVisible)
           
            <select>
                @foreach($states as $state)
                <option wire:click="selectState('{{ $state->name }}')">{{ $state->name }}</option>
                @endforeach
            </select>
        @endif
    </div>
    <div class="sorting mr-auto">
        <select>
            <option value="12">Show 12</option>
            <option value="24">Show 24</option>
            <option value="36">Show 36</option>
        </select>
    </div>
    <div class="pagination">
        <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
        <a href="#">6</a>
        <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
    </div>
</div>

@livewireScripts