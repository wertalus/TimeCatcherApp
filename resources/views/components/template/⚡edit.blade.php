<?php

use Livewire\Component;
use App\Models\Template;

new class extends Component
{
    public Template $post; 
    public Template $template;
};
?>

<div>
    <h5>{{ __('Edit Template') }}</h5>

    <hr>
    <p>{{ __('This is a placeholder for the template editing interface.') }}</p>
    <p>{{ __('Here you would implement the form and logic to edit an existing template.') }}</p>
    @if ($template)
        <div class="alert alert-info">
            {{ __('Editing template:') }} {{ $template->title }}
        </div>
    @else
        <div class="alert alert-warning">
            {{ __('No template selected. Please select a template to edit from the list.') }}
        </div>
    @endif
</div>
</div>  
</div>