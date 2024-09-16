<div class="form-group row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <label for=""> Name *</label>
                <input type="text" required class="form-control" name="name" value="{{ old('name', $item->name) }}">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <label for="">Image</label>
        <input type="file" class="form-control" accept="image/*" name="image">
        @if ($item->getImage())
            <img src="{{ $item->getImage() }}" alt="" width="30%">
        @endif
    </div>
    <div class="col-md-6 mt-4">
        <label for="">Price *</label>
        <input type="number" required class="form-control" name="price" value="{{ old('price', $item->price) }}">
    </div>
    <div class="col-12 mt-4">
        <label for="">Description *</label>
        <textarea name="description" class="form-control" rows="5">{{ old('description', $item->description) }}</textarea>
    </div>
</div>
