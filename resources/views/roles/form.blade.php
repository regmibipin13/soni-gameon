<div class="form-group">
    <label for="name">{{ __('Name') }}</label>
    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
        placeholder="{{ __('Name') }}" value="{{ isset($role) ? $role->name : old('name', '') }}">
    @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="permissions">{{ __('Permissions') }}</label>
    <select name="permissions[]" id="permissions"
        class="form-control {{ $errors->has('permissions') ? 'is-invalid' : '' }} select2" multiple>
        @foreach ($permissions as $key => $permission)
            <option value="{{ $key }}"
                {{ isset($role) ? (in_array($key, old('permissions', [])) || $role->permissions->contains($key) ? 'selected' : '') : '' }}>
                {{ $permission }}</option>
        @endforeach
    </select>
    @if ($errors->has('permissions'))
        <p class="text-danger">{{ $errors->first('permissions') }}</p>
    @endif
</div>
