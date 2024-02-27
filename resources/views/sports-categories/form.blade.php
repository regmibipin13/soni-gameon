<div class="form-group">
    <label for="name">{{ __('Name') }}</label>
    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
        placeholder="{{ __('Name') }}" value="{{ isset($sportCategory) ? $sportCategory->name : old('name', '') }}">
    @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="is_enabled">{{ __('Enabled') }}</label><br />
    <input type="checkbox"
        {{ (isset($sportCategory) ? ($sportCategory->is_enabled ? 'checked' : '') : old('is_enabled')) ? 'checked' : '' }}
        data-toggle="toggle" data-size="sm" name="is_enabled" data-on="Enabled" data-off="Disabled"
        data-onstyle="success" data-offstyle="danger">
    @if ($errors->has('is_enabled'))
        <p class="text-danger">{{ $errors->first('is_enabled') }}</p>
    @endif
</div>
