<div class="form-group row">
    <!-- Name Field -->
    <div class="col-md-6">
        <label for="name">Name <span class="text-danger">*</span></label>
        <input type="text" id="name" name="name" class="form-control" 
               placeholder="Enter name" required 
               value="{{ old('name', $item->name) }}">
    </div>

    <!-- Location Field -->
    <div class="col-md-6">
        <label for="location">Location <span class="text-danger">*</span></label>
        <input type="text" id="location" name="location" class="form-control" 
               placeholder="Enter location" required 
               value="{{ old('location', $item->location) }}">
    </div>

    <!-- Image Upload -->
    <div class="col-md-6 mt-3">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control" accept="image/*">
        @if ($item->getImage())
            <img src="{{ $item->getImage() }}" alt="Uploaded Image" class="mt-2" style="width: 100%; max-width: 200px; height: auto;">
        @endif
    </div>

    <!-- Price Field -->
    <div class="col-md-6 mt-3">
        <label for="price">Price <span class="text-danger">*</span></label>
        <input type="number" id="price" name="price" class="form-control" 
               placeholder="Enter price" required 
               value="{{ old('price', $item->price) }}">
    </div>

    <!-- Description Field -->
    <div class="col-12 mt-3">
        <label for="description">Description <span class="text-danger">*</span></label>
        <textarea id="description" name="description" class="form-control" rows="5" 
                  placeholder="Enter description">{{ old('description', $item->description) }}</textarea>
    </div>
</div>
