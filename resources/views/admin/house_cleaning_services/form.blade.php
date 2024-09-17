<div class="form-group row">
    <div class="col-md-6">
        <label for="name"> Name *</label>
        <input type="text" required class="form-control" name="name" value="{{ old('name', $item->name ?? '') }}">
    </div>

    <div class="col-md-6">
        <label for="email"> Email *</label>
        <input type="email" required class="form-control" name="email"
            value="{{ old('email', $item->email ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="phone"> Phone *</label>
        <input type="tel" required class="form-control" name="phone"
            value="{{ old('phone', $item->phone ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="location"> Location *</label>
        <input type="text" required class="form-control" name="location"
            value="{{ old('location', $item->location ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="number_of_bedroom"> Number of Bedrooms *</label>
        <input type="number" required class="form-control" name="number_of_bedroom"
            value="{{ old('number_of_bedroom', $item->number_of_bedroom ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="number_of_bathroom"> Number of Bathrooms *</label>
        <input type="number" required class="form-control" name="number_of_bathroom"
            value="{{ old('number_of_bathroom', $item->number_of_bathroom ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="number_of_story"> Number of Stories *</label>
        <input type="number" required class="form-control" name="number_of_story"
            value="{{ old('number_of_story', $item->number_of_story ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="frequency"> Cleaning Frequency *</label>
        <select class="form-control" name="frequency">
            <option value="Fortnightly"
                {{ old('frequency', $item->frequency ?? '') == 'Fortnightly' ? 'selected' : '' }}>Fortnightly</option>
            <option value="Monthly" {{ old('frequency', $item->frequency ?? '') == 'Monthly' ? 'selected' : '' }}>
                Monthly</option>
        </select>
    </div>

    <div class="col-md-6 mt-4">
        <label for="service_date"> Service Date *</label>
        <input type="date" required class="form-control" name="service_date"
            value="{{ old('service_date', $item->service_date ?? '') }}">
    </div>

    <div class="col-md-6 mt-4">
        <label for="service_time"> Service Time *</label>
        <input type="time" required class="form-control" name="service_time"
            value="{{ old('service_time', $item->service_time ?? '') }}">
    </div>

    <div class="col-md-12 mt-4">
        <label for="message"> Message (Optional)</label>
        <textarea class="form-control" name="message" rows="5">{{ old('message', $item->message ?? '') }}</textarea>
    </div>

    <div class="col-md-6 mt-4">
        <label for="status"> Status *</label>
        <select class="form-control" name="status">
            <option value="Pending" {{ old('status', $item->status ?? '') == 'Pending' ? 'selected' : '' }}>Pending
            </option>
            <option value="Cancelled" {{ old('status', $item->status ?? '') == 'Cancelled' ? 'selected' : '' }}>
                Cancelled</option>
            <option value="Approved" {{ old('status', $item->status ?? '') == 'Approved' ? 'selected' : '' }}>Approved
            </option>
        </select>
    </div>


</div>
