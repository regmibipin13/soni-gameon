<div class="card">
    <div class="card-header">
        Vendor Owner Info
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="name">{{ __('Owner Name') }}</label>
            <input type="text" class="form-control {{ $errors->has('user_name') ? 'is-invalid' : '' }}" name="user_name"
                placeholder="{{ __('Owner name') }}"
                value="{{ isset($vendor) ? $vendor->user->name : old('user_name', '') }}">
            @if ($errors->has('user_name'))
                <p class="text-danger">{{ $errors->first('user_name') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                placeholder="{{ __('Email') }}"
                value="{{ isset($vendor) ? $vendor->user->email : old('email', '') }}">
            @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="phone">{{ __('Phone') }}</label>
            <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone"
                placeholder="{{ __('Phone') }}"
                value="{{ isset($vendor) ? $vendor->user->phone : old('phone', '') }}">
            @if ($errors->has('phone'))
                <p class="text-danger">{{ $errors->first('phone') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="user_type">{{ __('User Type') }}</label>
            <div class="input-check-group d-flex align-items-center">

                <div class="d-flex align-items-center mr-2">
                    <input type="radio" name="user_type" value="vendor" class="form-check" checked disabled>
                    &nbsp;Vendor
                </div>

            </div>
            @if ($errors->has('user_type'))
                <p class="text-danger">{{ $errors->first('user_type') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="password">{{ __('Password (Leave If You want to Have System Generated Password)') }}</label>
            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                name="password" placeholder="{{ __('Password') }}" value="">
            @if ($errors->has('password'))
                <p class="text-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>
    </div>
</div>
<div class="form-group">
    <label for="name">{{ __('Name') }}</label>
    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
        placeholder="{{ __('name') }}" value="{{ isset($vendor) ? $vendor->name : old('name', '') }}">
    @if ($errors->has('name'))
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="tax_number">{{ __('Tax Number (PAN)') }}</label>
    <input type="text" class="form-control {{ $errors->has('tax_number') ? 'is-invalid' : '' }}" name="tax_number"
        placeholder="{{ __('Tax Number') }}"
        value="{{ isset($vendor) ? $vendor->tax_number : old('tax_number', '') }}">
    @if ($errors->has('tax_number'))
        <p class="text-danger">{{ $errors->first('tax_number') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="city">{{ __('City') }}</label>
    <select class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city"
        placeholder="{{ __('City') }}">
        @foreach (App\Models\Vendor::CITIES as $key => $value)
            <option value="{{ $key }}"
                {{ isset($vendor) ? ($key == $vendor->city ? 'selected' : '') : old('city', '') }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('city'))
        <p class="text-danger">{{ $errors->first('city') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="address">{{ __('Address') }}</label>
    <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address"
        placeholder="{{ __('Address') }}" value="{{ isset($vendor) ? $vendor->address : old('address', '') }}">
    @if ($errors->has('address'))
        <p class="text-danger">{{ $errors->first('address') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="zipcode">{{ __('Zip Code') }}</label>
    <input type="text" class="form-control {{ $errors->has('zipcode') ? 'is-invalid' : '' }}" name="zipcode"
        placeholder="{{ __('Zip Code') }}" value="{{ isset($vendor) ? $vendor->zipcode : old('zipcode', '') }}">
    @if ($errors->has('zipcode'))
        <p class="text-danger">{{ $errors->first('zipcode') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="google_map_link">{{ __('Google Map Link') }}</label>
    <input type="text" class="form-control {{ $errors->has('google_map_link') ? 'is-invalid' : '' }}"
        name="google_map_link" placeholder="{{ __('Google Map Link') }}"
        value="{{ isset($vendor) ? $vendor->google_map_link : old('google_map_link', '') }}">
    @if ($errors->has('google_map_link'))
        <p class="text-danger">{{ $errors->first('google_map_link') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="status">{{ __('Status') }}</label>
    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
        placeholder="{{ __('Status') }}">
        @foreach (App\Models\Vendor::STATUS as $key => $value)
            <option value="{{ $key }}"
                {{ isset($vendor) ? ($key == $vendor->status ? 'selected' : '') : old('status', '') }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('status'))
        <p class="text-danger">{{ $errors->first('status') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="is_banned">{{ __('Banned') }}</label><br />
    <input type="checkbox" id="is_banned"
        {{ (isset($vendor) ? ($vendor->is_banned ? 'checked' : '') : old('is_banned')) ? 'checked' : '' }}
        data-toggle="toggle" data-size="sm" name="is_banned" data-on="Banned" data-off="Not Banned"
        data-onstyle="danger" data-offstyle="warning">
    @if ($errors->has('is_banned'))
        <p class="text-danger">{{ $errors->first('is_banned') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="banned_reason">{{ __('Banned Reason') }}</label>
    <input type="text" id="banned_reason"
        class="form-control {{ $errors->has('banned_reason') ? 'is-invalid' : '' }}" name="banned_reason"
        placeholder="{{ __('Banned Reason') }}"
        value="{{ isset($vendor) ? $vendor->banned_reason : old('banned_reason', '') }}">
    @if ($errors->has('banned_reason'))
        <p class="text-danger">{{ $errors->first('banned_reason') }}</p>
    @endif
</div>


<div class="form-group">
    <label for="is_close">{{ __('Close') }}</label><br />
    <input type="checkbox"
        {{ (isset($vendor) ? ($vendor->is_close ? 'checked' : '') : old('is_close')) ? 'checked' : '' }}
        data-toggle="toggle" data-size="sm" name="is_close" data-on="Closed" data-off="Open" data-onstyle="danger"
        data-offstyle="warning">
    @if ($errors->has('is_close'))
        <p class="text-danger">{{ $errors->first('is_close') }}</p>
    @endif
</div>

@include('includes.media', [
    'label' => 'Display Image',
    'model' => isset($vendor) ? $vendor : null,
])
