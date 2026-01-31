<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>{{ __('All templates') }}</h5>
        <div class="input-group w-50">
            <input type="search" class="form-control" placeholder="{{ __('Search') }}" wire:model.debounce.300ms="search">
        </div>
    </div>

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Items') }}</th>
                <th>{{ __('Created') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($templates as $template)
                <tr>
                    <td>{{ $loop->iteration + ($templates->currentPage()-1)*$templates->perPage() }}</td>
                    <td>{{ $template->title }}</td>
                    <td>{{ $template->items_count }}</td>
                    <td>{{ $template->created_at->diffForHumans() }}</td>
                    <td class="text-end">
                        <button wire:click="deleteTemplate({{ $template->id }})" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $templates->links() }}
</div>