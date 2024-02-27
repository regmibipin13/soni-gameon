<form action="{{ $action ?? '' }}" method="GET">
    <div class="d-flex align-items-center">
        @foreach ($fields as $name => $type)
            @if ($type == 'text' || $type == 'number' || $type == 'email')
                <div class="form-group">
                    <label for="{{ $name }}">{{ ucfirst($name) }}</label>
                    <input type="{{ $type }}" name="filter[{{ $name }}]" class="form-control"
                        placeholder="{{ ucfirst($name) }}" value="{{ request()->filter[$name] ?? '' }}">
                </div>
            @endif

            @if (is_array($fields[$name]))
                <div class="form-group">
                    <label for="{{ $name }}">{{ ucfirst($name) }}</label>
                    <select name="filter[{{ $name }}]" id="{{ $name }}" class="form-control"
                        {{ $type['multiple'] ? 'mutiple' : '' }}>
                        @if ($type['type'] == 'static')
                            <option value="">All</option>
                            @foreach ($type['options'] as $option)
                                <option value="{{ $option }}"
                                    {{ request()->has('filter') && request()->filter[$name] == $option ? 'selected' : '' }}>
                                    {{ ucfirst($option) }}
                                </option>
                            @endforeach
                        @else
                            <option value="">All</option>
                            @foreach ($type['option'] as $key => $value)
                                <option value="{{ $key }}"
                                    {{ request()->has('filter') && request()->filter[$name] == $key ? 'selected' : '' }}>
                                    {{ ucfirst($value) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            @endif
            &nbsp;&nbsp;
        @endforeach
    </div>

    <div class="filter">
        <button type="submit" class="btn btn-info">Filter</button>
    </div>
</form>
