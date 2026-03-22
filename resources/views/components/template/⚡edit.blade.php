<?php

use Livewire\Component;
use App\Models\TemplateItem;
use Livewire\Attributes\Layout;

new #[Layout('layouts::livewire')] class extends Component
{
    public $templateId;
    public $items = [];

    public function addChild()
    {
        $id = uniqid();
        // Add a new point with an empty subtitle
        $this->items[$id] = [
            'id' => $id,
            'subtitle' => '',
            'position' => count($this->items) + 1
        ];
    }

    public function removeChild($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
            // Update positions
            $index = 0;
            foreach ($this->items as $itemId => $itemData) {
                $this->items[$itemId]['position'] = $index + 1;
                if (is_numeric($itemId)) {
                    TemplateItem::where('id', $itemId)->update(['position' => $index + 1]);
                }
                $index++;
            }
            // Delete from database if existing
            if (is_numeric($id)) {
                TemplateItem::where('id', $id)->delete();
            }
        }

        // Keep at least one point to avoid an empty UI
        if (empty($this->items)) {
            $this->addChild();
        }
    }

    public function updatedItems()
    {
        $index = 0;
        foreach ($this->items as $id => $itemData) {
            $this->items[$id]['position'] = $index + 1;
            if (is_numeric($id)) {
                TemplateItem::where('id', $id)->update(['position' => $index + 1]);
            }
            $index++;
        }
    }

    public function saveTemplate()
    {
        // Validate or process items as needed before saving
        foreach ($this->items as $id => $itemData) {
            if (is_numeric($id)) {
                // Update existing
                $item = TemplateItem::find($id);
                if ($item) {
                    $item->update([
                        'subtitle' => $itemData['subtitle'],
                        'position' => $itemData['position']
                    ]);
                }
            } else {
                // Create new
                TemplateItem::create([
                    'template_id' => $this->templateId,
                    'subtitle' => $itemData['subtitle'],
                    'position' => $itemData['position']
                ]);
            }
        }

        // Optionally, remove items that are no longer in the list (if needed)
        // But for now, just save what's there

        session()->flash('message', __('Template saved successfully.'));
        // Redirect or refresh
        return redirect()->route('templates-list'); // Adjust route as needed
    }

    public function handleSort($itemId, $newPosition)
    {
        // Move the item to the new position in the array
        $temp = $this->items[$itemId];
        unset($this->items[$itemId]);

        // Get the current items as array
        $itemsArray = array_values($this->items);

        // Insert the item at the new position
        array_splice($itemsArray, $newPosition, 0, [$temp]);

        // Rebuild the items array with updated positions
        $this->items = [];
        foreach ($itemsArray as $index => $item) {
            $this->items[$item['id']] = $item;
            $this->items[$item['id']]['position'] = $index + 1;
            if (is_numeric($item['id'])) {
                TemplateItem::where('id', $item['id'])->update(['position' => $index + 1]);
            }
        }
    }

    public function mount($id)
    {
        $this->templateId = $id;
        $existingItems = TemplateItem::where('template_id', $id)->orderBy('position')->get();
        $this->items = [];
        foreach ($existingItems as $item) {
            $this->items[$item->id] = [
                'id' => $item->id,
                'subtitle' => $item->subtitle,
                'position' => $item->position
            ];
        }
        // Start with one empty point for better UX if none exist
        if (empty($this->items)) {
            $this->addChild();
        }
    }
};
?>

<form id="edit-template" wire:submit.prevent="saveTemplate" class="container" autocomplete="off">
    <h5 class="text-start">{{ __('Edit template') }}</h5>
    <hr>
    @if($items)
    <div class="row g-3 align-items-start mt-3">
        <div class="col">
                <ul class="row g-2 align-items-center mb-2" wire:sort="handleSort">
                @foreach($items as $id => $item)
                        <li class="col-12 d-flex align-items-center" wire:key="{{ $item['id'] }}" wire:sort:item="{{ $item['id'] }}">
                            <div class="col-auto">
                                <span class="badge bg-secondary" wire:sortable.handle style="cursor: grab;">{{ $loop->iteration }}</span>
                            </div>
                            <div class="col mx-2">
                                <input type="text" class="form-control" placeholder="{{$item['subtitle']}}"  wire:model="items.{{ $id }}.subtitle" autocomplete="off" />
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-danger" wire:click="removeChild('{{ $id }}')">&times;</button>
                            </div>
                        </li>
                @endforeach
                </ul>
            </div>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <button type="button" class="btn btn-outline-primary justyfy-content-center align-items-center border rounded-circle" style="width:40px;height:40px" wire:click="addChild" title="{{ __('Add Point') }}" aria-label="{{ __('Add Point') }}">
                    <i class="bi bi-plus-lg" aria-hidden="true"></i>
                </button>
            </div>
            <button type="submit" class="btn btn-primary mt-3">{{ __('Save Template') }}</button>
        </div>
    @else
        <div class="alert alert-danger">{{ __('Template not found.') }}</div>
    @endif
    
</form>
