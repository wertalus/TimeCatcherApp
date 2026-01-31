<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Template;
use Illuminate\Validation\Rule;


new class extends Component
{
    public $message = '';
    public $title = '';
    public $items = [];

    public function mount()
    {
        // Start with one empty point for better UX
        if (empty($this->items)) {
            $this->addChild();
        }
    }

    public function addChild()
    {
        // Add a new point with an empty subtitle
        $this->items[] = ['id' => uniqid(), 'subtitle' => ''];
    }

    public function removeChild($index)
    {
        if (isset($this->items[$index])) {
            array_splice($this->items, $index, 1);
        }

        // Keep at least one point to avoid an empty UI
        if (empty($this->items)) {
            $this->addChild();
        }
    }

    protected function rules() 
    {
        return [
                'title' => [
                'required',
                'string',
                'max:255',
                'min:8',
                Rule::unique('templates')->where(function ($query) {
                    return $query->where('user_id', auth()->id());
                }),
            ],
            'items.*.subtitle' => 'nullable|string|max:255',
        ];
    }

    protected function messages() 
    {
        return [
            'title.unique' => __('The template title must be unique.'),
            'title.required' => __('The title is required.'),
            'title.string' => __('The title must be a string.'),
            'title.min' => __('The title is too short.'),
            'title.max' => __('The title is too long.'),
            'items.*.subtitle.nullable' => __('The subtitle is required.'),
            'items.*.subtitle.string' => __('The subtitle must be a string.'),
            'items.*.subtitle.max' => __('The subtitle is too long.'),
        ];
    }

    public function saveTemplate()
    {
        $this->validate();

        // create template
        $template = Template::create([
            'title' => $this->title,
            'user_id' => auth()->id(),
        ]);

        // create items
        foreach ($this->items as $index => $item) {
            $template->items()->create([
                'subtitle' => $item['subtitle'] ?? null,
                'position' => $index + 1,
            ]);
        }

        $this->message = __('Template saved successfully.');

        // reset form but keep one empty point
        $this->title = '';
        $this->items = [];
        $this->addChild();
    }
};
?>


<form id="template-create" wire:submit.prevent="saveTemplate" class="container" autocomplete="off">
  <h5 class="text-start">{{ __('Template Create') }}</h5>
  <hr>
  @if ($message)
      <div class="alert alert-success" role="alert">
            {{ $message }}
      </div>
  @endif
    <div class="row g-3 align-items-center mt-3">
        <div class="col-1">
            <label class="form-label" for="title">{{__('Title')}}</label>
        </div>
        <div class="col">
            <input type="text" class="form-control" id="title" placeholder="{{ __('Please enter title') }}" wire:model="title" autocomplete="off">
            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row g-3 align-items-start mt-3">
        <div class="col-1">
            <label for="points">{{__('Points')}}</label>
        </div>
        <div class="col">
            @foreach($items as $index => $item)
                <div class="row g-2 align-items-center mb-2" wire:key="{{ $item['id'] }}">
                    <div class="col-auto">
                        <span class="badge bg-secondary">{{ $loop->iteration }}</span>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="{{ __('Enter subtitle') }}" wire:model="items.{{ $index }}.subtitle" autocomplete="off" />
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-sm btn-danger" wire:click="removeChild({{ $index }})">&times;</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mb-3">
            <button type="button" class="btn btn-outline-primary justyfy-content-center align-items-center border rounded-circle" style="width:40px;height:40px" wire:click="addChild" title="{{ __('Add Point') }}" aria-label="{{ __('Add Point') }}">
                <i class="bi bi-plus-lg" aria-hidden="true"></i>
            </button>
        </div>
        <button type="submit" class="btn btn-primary mt-3">{{ __('Save Template') }}</button>
    </div>
</form>