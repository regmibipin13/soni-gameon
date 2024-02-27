<div class="form-group">
    <label for="{{ $label }}">{{ __($label) }}</label><br />
    @if (isset($model))
        <div class="img-block d-flex flex-wrap align-items-center">
            @foreach ($model->getMedia() as $index => $media)
                <div class="images d-flex flex-column my-2">
                    <img src="{{ $media->getUrl() }}" class="img-fluid mb-2">
                </div>
            @endforeach
        </div>
    @endif
    <div class="file-upload"></div>
    @if ($errors->has('filepond'))
        <p class="text-danger">{{ $errors->first('filepond') }}</p>
    @endif
</div>
