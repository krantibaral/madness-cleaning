<div class="form-group row">
    <div class="col-md-6">
        <label for="name"> Name *</label>
        <input type="text" required class="form-control" name="name" value="{{ old('name', $item->name ?? '') }}">
    </div>

    <div class="col-md-6">
        <label for="email"> Email *</label>
        <input type="email" required class="form-control" name="email" value="{{ old('email', $item->email ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="phone"> Phone *</label>
        <input type="tel" required class="form-control" name="phone" value="{{ old('phone', $item->phone ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="location"> Location *</label>
        <input type="text" required class="form-control" name="location" value="{{ old('location', $item->location ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="number_of_windows"> Number of Windows *</label>
        <input type="number" required class="form-control" name="number_of_windows" value="{{ old('number_of_windows', $item->number_of_windows ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="number_of_story"> Number of Stories *</label>
        <input type="number" required class="form-control" name="number_of_story" value="{{ old('number_of_story', $item->number_of_story ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="service_date"> Service Date *</label>
        <input type="date" required class="form-control" name="service_date" value="{{ old('service_date', $item->service_date ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="service_time"> Service Time *</label>
        <input type="time" required class="form-control" name="service_time" value="{{ old('service_time', $item->service_time ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="type"> Cleaning Type *</label>
        <select class="form-control" name="type">
            <option value="Inside" {{ old('type', $item->type ?? '') == 'Inside' ? 'selected' : '' }}>Inside</option>
            <option value="Outside" {{ old('type', $item->type ?? '') == 'Outside' ? 'selected' : '' }}>Outside</option>
            <option value="Both" {{ old('type', $item->type ?? '') == 'Both' ? 'selected' : '' }}>Both</option>
        </select>
    </div>

    <div class="col-md-6 mt-4">
        <label for="windows_track_frame"> Windows Track/Frame *</label>
        <select class="form-control" name="windows_track_frame">
            <option value="Track" {{ old('windows_track_frame', $item->windows_track_frame ?? '') == 'Track' ? 'selected' : '' }}>Track</option>
            <option value="Frame" {{ old('windows_track_frame', $item->windows_track_frame ?? '') == 'Frame' ? 'selected' : '' }}>Frame</option>
            <option value="Both" {{ old('windows_track_frame', $item->windows_track_frame ?? '') == 'Both' ? 'selected' : '' }}>Both</option>
        </select>
    </div>

    <div class="col-md-12 mt-4">
        <label for="message"> Message (Optional)</label>
        <textarea class="form-control" name="message" rows="5">{{ old('message', $item->message ?? '') }}</textarea>
    </div>

    <div class="col-md-6 mt-4">
        <label for="status"> Status *</label>
        <select class="form-control" name="status">
            <option value="Pending" {{ old('status', $item->status ?? '') == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Cancelled" {{ old('status', $item->status ?? '') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            <option value="Approved" {{ old('status', $item->status ?? '') == 'Approved' ? 'selected' : '' }}>Approved</option>
        </select>
    </div>

    <div class="col-md-6 mt-4">
        <label for="image"> Image</label>
        <input type="file" class="form-control" accept="image/*" name="image">
        @if (!empty($item) && $item->getImage())
            <img src="{{ $item->getImage() }}" alt="" width="30%">
        @endif
    </div>
</div>
