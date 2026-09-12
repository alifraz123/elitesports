@extends('layouts.admin')

@section('header', 'Categories')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">All Categories</div>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a>
    </div>
    <div class="card-body" style="padding: 0;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background: #f9fafb; border-bottom: 1px solid var(--border);">
                    <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Name</th>
                    <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Hierarchy</th>
                    <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase;">Status</th>
                    <th style="padding: 12px 24px; font-weight: 600; color: var(--text-light); font-size: 12px; text-transform: uppercase; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr style="border-bottom: 1px solid var(--border);">
                    <td style="padding: 16px 24px; font-weight: 600; color: var(--text-dark);">
                        {{ $category->name }}
                    </td>
                    <td style="padding: 16px 24px; font-size: 13px; color: var(--text-light);">
                        @if($category->parent_name)
                            {{ $category->parent_name }} > <span style="font-weight: 600; color: var(--text-dark);">{{ $category->name }}</span>
                        @else
                            <span style="font-weight: 600; color: var(--text-dark);">Top Level</span>
                        @endif
                    </td>
                    <td style="padding: 16px 24px;">
                        @if($category->status == 'Active')
                            <span style="background: #d1fae5; color: #047857; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">Active</span>
                        @else
                            <span style="background: #f3f4f6; color: #374151; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">Draft</span>
                        @endif
                    </td>
                    <td style="padding: 16px 24px; text-align: right;">
                        <div style="display: flex; gap: 10px; justify-content: flex-end;">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" style="color: var(--primary); font-size: 14px; font-weight: 600; padding: 4px; display: inline-flex; align-items: center;" title="Edit">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                            </a>
                            <button type="button" onclick="openDeleteModal('{{ route('admin.categories.destroy', $category->id) }}', '{{ addslashes($category->name) }}')" style="background: none; border: none; color: #dc2626; font-size: 14px; font-weight: 600; cursor: pointer; padding: 4px; display: inline-flex; align-items: center;" title="Delete">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding: 30px; text-align: center; color: var(--text-light);">No categories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div style="padding: 20px 24px; border-top: 1px solid var(--border);">
            {{ $categories->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Advanced Delete Modal -->
<div id="deleteModal" style="display: none; position: fixed; inset: 0; background: rgba(17,24,39,0.7); z-index: 1000; align-items: center; justify-content: center;">
    <div style="background: #fff; border-radius: 12px; width: 400px; max-width: 90%; overflow: hidden; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);">
        <div style="padding: 24px; text-align: center;">
            <div style="width: 48px; height: 48px; border-radius: 50%; background: #fee2e2; color: #dc2626; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>
            <h3 style="font-size: 18px; font-weight: 700; color: #111827; margin-bottom: 8px;">Delete Category</h3>
            <p style="font-size: 14px; color: #6b7280; line-height: 1.5;">Are you sure you want to delete <strong id="deleteItemName" style="color: #111827;"></strong>? This action cannot be undone, but sub-categories will be safely preserved as top-level categories.</p>
        </div>
        <div style="background: #f9fafb; padding: 16px 24px; display: flex; gap: 12px; justify-content: flex-end;">
            <button type="button" onclick="closeDeleteModal()" style="padding: 10px 16px; border-radius: 6px; font-weight: 600; font-size: 14px; background: #fff; border: 1px solid #d1d5db; color: #374151; cursor: pointer;">Cancel</button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" style="padding: 10px 16px; border-radius: 6px; font-weight: 600; font-size: 14px; background: #dc2626; border: none; color: #fff; cursor: pointer;">Yes, Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteModal(url, name) {
        document.getElementById('deleteForm').action = url;
        document.getElementById('deleteItemName').innerText = name;
        document.getElementById('deleteModal').style.display = 'flex';
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }
</script>
@endsection
