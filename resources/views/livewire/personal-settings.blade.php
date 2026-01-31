
<form id="personal-settings" wire:submit.prevent="saveSettings" class="container" autocomplete="off">
  <h5 class="text-start">{{__('Personal Settings')}}</h5>
  <hr>
  @if ($message)
      <div class="alert alert-success" role="alert">
            {{ $message }}
      </div>
  @endif
    <div class="row g-3 align-items-center mt-3">
        <div class="col-1">
            <label class="" for="language-select">{{__('Language')}}</label>
        </div>
        <div class="col-auto">
            <select id="language-select" class="form-control" wire:model="selectedLanguage">
                <option value="pl">🇵🇱 Polski</option>
                <option value="en">🇺🇸 English</option>
            </select>
        </div>
    </div>
    <div class="row g-3 align-items-center mt-3">
        <div class="col-1">
            <label for="theme-select">{{__('Theme')}}</label>
        </div>
        <div class="col-auto">
            <select id="theme-select" class="form-control" wire:model="selectedTheme">
                <option value="light"> {{__('Light')}}</option>
                <option value="dark"> {{__('Dark')}}</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-4">{{__('Save Settings')}}</button>
    </div>
</form>
