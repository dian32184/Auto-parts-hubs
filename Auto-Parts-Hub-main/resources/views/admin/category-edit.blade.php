@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Edit Category</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{route('admin.index')}}">Dashboard</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{route('admin.categories')}}">Categories</a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>Edit Category</li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.category.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $category->id }}">

                    <div class="form-group mb-3">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="slug">Slug <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}" required>
                        @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="type">Type <span class="text-danger">*</span></label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Select Type</option>
                            <option value="motor" {{ $category->type == 'motor' ? 'selected' : '' }}>Motor Parts</option>
                            <option value="vehicle" {{ $category->type == 'vehicle' ? 'selected' : '' }}>Vehicle Parts</option>
                        </select>
                        @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="parent_id">Parent Category</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="">None (Top Level)</option>
                            @foreach($categories as $cat)
                                @if($cat->id != $category->id)
                                <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                                @endif
                            @endforeach
                        </select>
                        @error('parent_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $category->description }}</textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        @if($category->image)
                        <div class="mb-2">
                            <img src="{{ asset($category->image_path) }}" alt="{{ $category->name }}" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                        @endif
                        <input type="file" class="form-control" id="image" name="image">
                        <small class="form-text text-muted">Leave empty to keep the current image. Recommended size: 800x600 pixels</small>
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /new-category -->
    </div>
    <!-- /main-content-wrap -->
</div>                    
</div>

<script>
document.getElementById('name').addEventListener('keyup', function() {
    let slug = this.value.toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '-')
        .replace(/^-+|-+$/g, '');
    document.getElementById('slug').value = slug;
});

document.getElementById('type').addEventListener('change', function() {
    let parentSelect = document.getElementById('parent_id');
    let currentParentId = '{{ $category->parent_id }}';
    parentSelect.innerHTML = '<option value="">None (Top Level)</option>';
    
    if (this.value) {
        fetch(`/admin/categories/by-type/${this.value}`)
            .then(response => response.json())
            .then(categories => {
                categories.forEach(category => {
                    if (category.id != {{ $category->id }}) {
                        let option = new Option(category.name, category.id);
                        if (category.id == currentParentId) {
                            option.selected = true;
                        }
                        parentSelect.add(option);
                    }
                });
            });
    }
});
</script>
@endsection