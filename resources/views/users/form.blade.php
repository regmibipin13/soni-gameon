<div class="form-group">
    <label for="name">{{ __('Name') }}</label>
    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
        placeholder="{{ __('Name') }}" value="{{ isset($user) ? $user->name : old('name', '') }}">
    @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="email">{{ __('Email') }}</label>
    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
        placeholder="{{ __('Email') }}" value="{{ isset($user) ? $user->email : old('email', '') }}">
    @if ($errors->has('email'))
        <p class="text-danger">{{ $errors->first('email') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="phone">{{ __('Phone') }}</label>
    <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone"
        placeholder="{{ __('Phone') }}" value="{{ isset($user) ? $user->phone : old('phone', '') }}">
    @if ($errors->has('phone'))
        <p class="text-danger">{{ $errors->first('phone') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="user_type">{{ __('User Type') }}</label>
    <div class="input-check-group d-flex align-items-center">
        <div class="d-flex align-items-center mr-2">
            <input type="radio" name="user_type" value="admin" class="form-check"
                {{ isset($user) ? ($user->user_type == 'admin' ? 'checked' : '') : (old('user_type', '') == 'admin' ? 'checked' : '') }}>
            &nbsp;Admin
        </div>
        <div class="d-flex align-items-center mr-2">
            <input type="radio" name="user_type" value="vendor" class="form-check"
                {{ isset($user) ? ($user->user_type == 'vendor' ? 'checked' : '') : (old('user_type', '') == 'vendor' ? 'checked' : '') }}>
            &nbsp;Vendor
        </div>
        <div class="d-flex align-items-center mr-2">
            <input type="radio" name="user_type" value="customer" class="form-check"
                {{ isset($user) ? ($user->user_type == 'customer' ? 'checked' : '') : (old('user_type', '') == 'customer' ? 'checked' : '') }}>
            &nbsp;Customer
        </div>
    </div>
    @if ($errors->has('user_type'))
        <p class="text-danger">{{ $errors->first('user_type') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="roles">{{ __('Roles') }}</label>
    <select name="roles[]" id="roles" class="form-control {{ $errors->has('roles') ? 'is-invalid' : '' }} select2"
        multiple>
        @foreach ($roles as $key => $role)
            <option value="{{ $key }}"
                {{ isset($user) ? (in_array($key, old('roles', [])) || $user->roles->contains($key) ? 'selected' : '') : '' }}>
                {{ $role }}</option>
        @endforeach
    </select>
    @if ($errors->has('roles'))
        <p class="text-danger">{{ $errors->first('roles') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="password">{{ __('Password (Leave If You want to Have System Generated Password)') }}</label>
    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password"
        placeholder="{{ __('Password') }}" value="">
    @if ($errors->has('password'))
        <p class="text-danger">{{ $errors->first('password') }}</p>
    @endif
</div>
