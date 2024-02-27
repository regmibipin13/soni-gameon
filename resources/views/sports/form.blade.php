<div class="form-group">
    <label for="vendor_id">{{ __('Vendor') }}</label>
    <select class="form-control {{ $errors->has('vendor_id') ? 'is-invalid' : '' }}" name="vendor_id"
        placeholder="{{ __('Vendor') }}">
        @foreach ($vendors as $key => $value)
            <option value="{{ $key }}"
                {{ isset($sport) ? ($key == $sport->vendor_id ? 'selected' : '') : old('vendor_id', '') }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('vendor_id'))
        <p class="text-danger">{{ $errors->first('vendor_id') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="sport_category_id">{{ __('Sport Category') }}</label>
    <select class="form-control {{ $errors->has('sport_category_id') ? 'is-invalid' : '' }}" name="sport_category_id"
        placeholder="{{ __('Sport Category') }}">
        @foreach ($categories as $key => $value)
            <option value="{{ $key }}"
                {{ isset($sport) ? ($key == $sport->sport_category_id ? 'selected' : '') : old('sport_category_id', '') }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('sport_category_id'))
        <p class="text-danger">{{ $errors->first('sport_category_id') }}</p>
    @endif
</div>


<div class="form-group">
    <label for="title">{{ __('Title') }}</label>
    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title"
        placeholder="{{ __('title') }}" value="{{ isset($sport) ? $sport->title : old('title', '') }}">
    @if ($errors->has('title'))
        <p class="text-danger">{{ $errors->first('title') }}</p>
    @endif
</div>



<div class="form-group">
    <label for="city">{{ __('City') }}</label>
    <select class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city"
        placeholder="{{ __('City') }}">
        @foreach (App\Models\Vendor::CITIES as $key => $value)
            <option value="{{ $key }}"
                {{ isset($sport) ? ($key == $sport->city ? 'selected' : '') : old('city', '') }}>
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
        placeholder="{{ __('Address') }}" value="{{ isset($sport) ? $sport->address : old('address', '') }}">
    @if ($errors->has('address'))
        <p class="text-danger">{{ $errors->first('address') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="description">{{ __('Description') }}</label>
    <textarea name="description" id="description" rows="5" class="form-control">{{ isset($sport) ? $sport->description : old('description', '') }}</textarea>
    @if ($errors->has('description'))
        <p class="text-danger">{{ $errors->first('description') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="price_per_hour">{{ __('Price (In Rs. / Hour)') }}</label>
    <input type="number" class="form-control {{ $errors->has('price_per_hour') ? 'is-invalid' : '' }}"
        name="price_per_hour" placeholder="{{ __('Price (In Rs. / Hour)') }}"
        value="{{ isset($sport) ? $sport->price_per_hour : old('price_per_hour', '') }}">
    @if ($errors->has('price_per_hour'))
        <p class="text-danger">{{ $errors->first('price_per_hour') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="opening_time">{{ __('Opening Time') }}</label>
    <input type="text" class="form-control {{ $errors->has('opening_time') ? 'is-invalid' : '' }}"
        name="opening_time" placeholder="{{ __('Opening Time') }}"
        value="{{ isset($sport) ? $sport->opening_time : old('opening_time', '') }}">
    @if ($errors->has('opening_time'))
        <p class="text-danger">{{ $errors->first('opening_time') }}</p>
    @endif
</div>
<div class="form-group">
    <label for="closing_time">{{ __('Closing Time') }}</label>
    <input type="text" class="form-control {{ $errors->has('closing_time') ? 'is-invalid' : '' }}"
        name="closing_time" placeholder="{{ __('Closing Time') }}"
        value="{{ isset($sport) ? $sport->closing_time : old('closing_time', '') }}">
    @if ($errors->has('closing_time'))
        <p class="text-danger">{{ $errors->first('closing_time') }}</p>
    @endif
</div>



@include('includes.media', [
    'label' => 'Images',
    'model' => isset($sport) ? $sport : null,
])
