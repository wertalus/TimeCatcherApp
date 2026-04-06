<?php

namespace App\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Template;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;



new #[Layout('layouts::livewire')] class extends Component
{
    use WithPagination;
    public $query = '';
 
    public function deleteTemplate($id)
    {

        $template = Template::where('user_id', auth()->id())->findOrFail($id);
        $template->delete();
        $count = $this->templates->total();
        session()->flash('message', __('Template deleted successfully.'));
        $this->gotoPage($this->templates->lastPage());
        unset($this->templates);
    }

    #[Computed]
    public function templates()
    {
        if($this->query) {
            return Template::where('user_id', auth()->id())
                ->where('title', 'like', '%' . $this->query . '%')
                ->paginate(10);
        } else {
            return Template::where('user_id', auth()->id())->paginate(10);
        }
    }
};
?>

<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>{{ __('All templates') }}</h5>
        <div class="input-group w-50">
            <input type="text" wire:model.live="query" class="form-control" placeholder="{{ __('Search') }}" autocomplete="off">
        </div>
    </div>

    @if (session('message'))
        <div class="alert alert-warning">{{ session('message') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Created') }}</th>
                <th>{{ __('ID') }}</th>
                <th class="text-center col-1">{{ __('Edit') }}</th>
                <th class="text-center col-1">{{ __('Select') }}</th>
                <th class="text-center col-1">{{ __('Delete') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($this->templates as $template)
                <tr wire:key="template-{{ $template->id }}">
                    <td>{{ $loop->iteration + ($this->templates->currentPage()-1)*$this->templates->perPage() }}</td>
                    <td>{{ $template->title }}</td>
                    <td>{{ $template->created_at->diffForHumans() }}</td>
                    <td>{{$template->id}}</td>
                    <td class="text-center col-1">
                        <a href="{{ route('edit-template', $template->id) }}" class="btn btn-sm btn-primary w-100">{{ __('Edit') }}</a>
                    </td>
                    <td class="text-center col-1">
                        <a href="{{route('measurement')}} " class="btn btn-sm btn-secondary w-100">{{ __('Select') }}</a>                           
                    </td>
                    <td class="text-center col-1">
                        <button wire:click="deleteTemplate({{ $template->id }})" wire:confirm="{{ __('Are you sure?') }}" class="btn btn-sm btn-danger w-100">{{ __('Delete') }}</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $this->templates->links() }}
</div>