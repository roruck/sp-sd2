<div class="mb-3">
    <label class="form-label">{{ __('app.conf.title') }}</label>
    <input name="title" value="{{ old('title', $conference['title']) }}"
           class="form-control @error('title') is-invalid @enderror">
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('app.conf.description') }}</label>
    <textarea name="description" rows="4"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $conference['description']) }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">{{ __('app.conf.speakers') }}</label>
    <input name="speakers" value="{{ old('speakers', $conference['speakers']) }}"
           class="form-control @error('speakers') is-invalid @enderror">
    @error('speakers') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">{{ __('app.conf.date') }}</label>
        <input type="date" name="date" value="{{ old('date', $conference['date']) }}"
               class="form-control @error('date') is-invalid @enderror">
        @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">{{ __('app.conf.time') }}</label>
        <input type="time" name="time" value="{{ old('time', $conference['time']) }}"
               class="form-control @error('time') is-invalid @enderror">
        @error('time') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mt-3 mb-4">
    <label class="form-label">{{ __('app.conf.address') }}</label>
    <input name="address" value="{{ old('address', $conference['address']) }}"
           class="form-control @error('address') is-invalid @enderror">
    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button class="btn btn-primary" type="submit">
    {{ __('app.form.save') }}
</button>
