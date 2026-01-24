<div class="container-fluid row py-4 border rounded-3">
    <div class="flex-shrink-0 border ms-4 rounded-3 col-2" style="width: 280px;" >   
        @livewire('side-menu-settings')
    </div>
    @if ($value == 5)
        <div class=" ms-4 col border rounded-3 p-4">
            @livewire('password-change')
        </div>
    @endif
    @if ($value == 4)
        <div class=" ms-4 col border rounded-3 p-4">
            <livewire:register-new-user />
        </div>
    @endif    
    @if ($value == 3)
        <div class=" ms-4 col border rounded-3 p-4">
            <livewire:personal-settings />
        </div>
    @endif
</div>
