@extends("TailwindCssLink.style")
@extends("Component.Nav_Dashbord")
@section("contents")
<meta name="csrf-token" content="{{ csrf_token() }}">
<table class="mx-auto divide-y divide-gray-200 overflow-x-auto bg-white shadow-md rounded-lg w-11/12 rounded-lg">
    <div class="relative max-w-sm mx-auto mt-4 mb-4">
        <form action="{{ route('admin.users.role') }}" method="GET">
            <input
                class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                type="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by username, email, or role">
            <button
                type="submit"
                class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-700 bg-gray-100 border border-gray-300 rounded-r-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.795 13.408l5.204 5.204a1 1 0 01-1.414 1.414l-5.204-5.204a7.5 7.5 0 111.414-1.414zM8.5 14A5.5 5.5 0 103 8.5 5.506 5.506 0 008.5 14z" />
                </svg>
            </button>
        </form>
    </div>
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Role
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Email
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($users as $user)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        @if (empty($user->thumbnail) || $user->thumbnail === 'default.png')
                        <img class="h-10 w-10 rounded-full" src="{{ asset('profile_placeholder.jpg') }}" alt="">
                        @else
                        <img class="h-10 w-10 rounded-full" src="{{asset($user->thumbnail) }}" alt="">
                        @endif
                        <!-- <img class="h-10 w-10 rounded-full" src="{{ asset($user->thumbnail) }}" alt=""> -->
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $user->username }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ $user->email }}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @if($user->isOnline())
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Online
                </span>
                @else
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                    Offline
                </span>
                @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $user->type }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $user->email }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <!-- Edit Button -->
                <button
                    class="text-indigo-600 hover:text-indigo-900 edit-role-btn"
                    data-id="{{ $user->id }}"
                    data-username="{{ $user->username }}"
                    data-type="{{ $user->type }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>

                </button>

                <!-- Delete Button -->
                <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" class="inline delete-role-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="ml-2 text-red-600 hover:text-red-900 delete-role-btn" data-id="{{ $user->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>

                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->
<div id="editRoleModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-1/3">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-800">Edit Role</h2>
        </div>
        <div class="p-6">
            <form id="editRoleForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" id="user_id">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" disabled>
                </div>
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="type" id="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelBtn" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 mr-2">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div>
    {{ $users->appends(request()->query())->links('vendor.pagination.custom') }}
</div>
<!-- Delete Confirmation Modal -->
<div id="deleteRoleModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-1/3">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-800">Confirm Delete</h2>
        </div>
        <div class="p-6">
            <p class="text-sm text-gray-600">Are you sure you want to delete this role?</p>
            <div class="flex justify-end mt-4">
                <button id="cancelDeleteBtn" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 mr-2">
                    Cancel
                </button>
                <button id="confirmDeleteBtn" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-role-btn');
        const modal = document.getElementById('editRoleModal');
        const form = document.getElementById('editRoleForm');
        const userIdInput = document.getElementById('user_id');
        const usernameInput = document.getElementById('username');
        const typeSelect = document.getElementById('type');
        const cancelBtn = document.getElementById('cancelBtn');
        const deleteButtons = document.querySelectorAll('.delete-role-btn');
        const deleteModal = document.getElementById('deleteRoleModal');
        const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        let deleteForm = null;

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-id');
                const username = this.getAttribute('data-username');
                const type = this.getAttribute('data-type');

                userIdInput.value = userId;
                usernameInput.value = username;
                typeSelect.value = type;

                // Update the form action URL
                form.action = `/admin/users/${userId}/update`;

                modal.classList.remove('hidden');
            });
        });

        cancelBtn.addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Use traditional form submission instead of fetch
            this.submit();
        });

        // Delete functionality remains the same
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                deleteForm = this.closest('.delete-role-form');
                deleteModal.classList.remove('hidden');
            });
        });

        cancelDeleteBtn.addEventListener('click', function() {
            deleteModal.classList.add('hidden');
        });

        confirmDeleteBtn.addEventListener('click', function() {
            if (deleteForm) {
                deleteForm.submit();
            }
        });
    });
</script>
@endsection