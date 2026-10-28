@csrf

<div class="row mb-4">
    <div class="col-lg-6">
        <div class="mb-3">
            <label for="first_name" class="form-label">First name</label>
            <input type="text" id="first_name" name="first_name"
                class="form-control @error('first_name') is-invalid @enderror"
                value="{{ old('first_name', $cv->first_name ?? '') }}" required>
            @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last name</label>
            <input type="text" id="last_name" name="last_name"
                class="form-control @error('last_name') is-invalid @enderror"
                value="{{ old('last_name', $cv->last_name ?? '') }}" required>
            @error('last_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $cv->email ?? '') }}" required>
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" id="phone" name="phone"
                class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone', $cv->phone ?? '') }}">
            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('cv.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
