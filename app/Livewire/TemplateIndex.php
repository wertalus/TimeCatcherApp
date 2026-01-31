<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Template;

class TemplateIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = ['refreshTemplates' => '$refresh'];

    public function deleteTemplate($id)
    {
        $template = Template::where('user_id', auth()->id())->findOrFail($id);
        $template->delete();
        session()->flash('message', __('Template deleted.'));
        $this->dispatch('refreshTemplates');
    }

    public function render()
    {
        $query = Template::withCount('items')->where('user_id', auth()->id());
        if ($this->search) {
            $query->where('title', 'like', '%'.$this->search.'%');
        }

        $templates = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.template.index', [
            'templates' => $templates,
        ]);
    }
}
