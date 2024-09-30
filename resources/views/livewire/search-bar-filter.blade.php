<div class="filter-bar d-flex flex-wrap align-items-center">
    
    {{-- <div class="sorting position-relative">
        <input 
            type="text" 
            wire:model.live="search_state" 
            placeholder="Search states..." 
            class="form-control"
            wire:keydown.enter="selectState(search_state)"  
        />
    
        @if($dropdownVisible)
            <select 
                class="form-control position-absolute w-100"
                style="top: 100%; z-index: 1000;"
                wire:change="selectState($event.target.value)"
            >
                <option value="" disabled selected>Select a state...</option>
                @foreach($states as $state)
                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                @endforeach
            </select>
        @endif
    </div> --}}
    <div class="sorting position-relative">
        <div class="dropdown">
            <input 
                type="text" 
                wire:model.live="search_state" 
                placeholder="Search and select a state..." 
                class="form-control"
                wire:focus="showDropdown"
                wire:blur="hideDropdownDelayed"
            />
            @if($dropdownVisible)
                <ul class="dropdown-menu w-100 show">
                    @forelse($states as $state)
                        <li><a class="dropdown-item" wire:click.prevent="selectState('{{ $state->name }}')">{{ $state->name }}</a></li>
                    @empty
                        <li><a class="dropdown-item disabled">No states found</a></li>
                    @endforelse
                </ul>
            @endif
        </div>
    </div>
    
    <div class="sort mr-auto">
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

