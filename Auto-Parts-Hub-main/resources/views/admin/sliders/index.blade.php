@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Manage Sliders</h4>
                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-light">
                        <i class="icon-plus"></i> Add New Slider
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover" id="slidersTable">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th width="120">Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Link</th>
                                    <th width="100">Status</th>
                                    <th width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                @foreach($sliders as $slider)
                                <tr data-id="{{ $slider->id }}">
                                    <td>
                                        <i class="icon-menu handle" style="cursor: move;"></i>
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $slider->image) }}" 
                                             alt="{{ $slider->title }}" 
                                             class="img-thumbnail"
                                             style="max-width: 100px;">
                                    </td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->subtitle }}</td>
                                    <td>
                                        @if($slider->link)
                                            <a href="{{ $slider->link }}" target="_blank">
                                                {{ Str::limit($slider->link, 30) }}
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $slider->is_active ? 'success' : 'danger' }}">
                                            {{ $slider->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.sliders.edit', $slider->id) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="icon-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.sliders.destroy', $slider->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this slider?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function() {
    $("#sortable").sortable({
        handle: '.handle',
        update: function(event, ui) {
            var orders = [];
            $('#sortable tr').each(function(index, element) {
                orders.push($(element).data('id'));
            });
            
            // Update order via AJAX
            $.ajax({
                url: '{{ route("admin.sliders.update-order") }}',
                type: 'POST',
                data: {
                    orders: orders,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Optional: Show success message
                    }
                }
            });
        }
    });
});
</script>
@endpush
@endsection 