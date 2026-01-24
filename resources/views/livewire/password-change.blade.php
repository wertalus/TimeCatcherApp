
<form id="password-change" wire:submit.prevent="changePassword" wire:key="formKey" class="container" autocomplete="off">
  <h5 class="text-start">{{__('Password Change')}}</h5>
  <hr>
  @if ($message)
      <div class="alert alert-success" role="alert">
          {{ $message }}
      </div>
  @endif
  <div class="row g-3 align-items-center">
    <div class="col-2">
      <label for="inputPassword6" class="col-form-label">{{__('Current Password')}}</label>
    </div>
    <div class="col-auto">
      <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" wire:model="oldPassword" autocomplete="new-password">
    </div>
    <div>
        @error('oldPassword') <span class="error">{{ $errors->first('oldPassword') }}</span> @enderror 
    </div>
  </div>
  <div class="row g-3 align-items-center mt-3">
    <div class="col-2">
      <label for="inputPassword7" class="col-form-label">{{__('New Password')}}</label>
    </div>
    <div class="col-auto">
      <input type="password" id="inputPassword7" class="form-control" aria-describedby="NewPasswordHelpInline" wire:model="newPassword" autocomplete="off">
    </div>
    <div class="col-auto">
      <span id="NewPasswordHelpInline" class="form-text">
        {{__('Must be at least 8 characters long.')}}
      </span>
    </div>
      <div>
        @error('newPassword') <span class="error">{{ $errors->first('newPassword') }}</span> @enderror 
    </div>
  </div>  
  <div class="row g-3 align-items-center mt-3">
    <div class="col-2">
      <label for="inputPassword8" class="col-form-label">{{__('Confirm Password')}}</label>
    </div>
    <div class="col-auto">
      <input type="password" id="inputPassword8" class="form-control" aria-describedby="confirmPasswordHelpInline" wire:model="confirmPassword" autocomplete="off">
    </div>
    <div class="col-auto">
      <span id="confirmPasswordHelpInline" class="form-text">
        {{__('Must match the password entered above.')}}
      </span>
    </div>
    <div>
      @error('confirmPassword') <span class="error">{{ $errors->first('confirmPassword') }}</span> @enderror 
    </div>
    <button type="submit" class="btn btn-primary mt-4">{{__('Change Password')}}</button>
  </div>
</form>
