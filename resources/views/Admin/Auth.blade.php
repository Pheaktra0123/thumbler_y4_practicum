@extends("TailwindCssLink.style")
@extends("Component.Nav_Dashbord")
@section("contents")
<table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Title
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
                            <img class="h-10 w-10 rounded-full" src="{{ asset($user->thumbnail) }}" alt="">
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
                    <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                    <div class="text-sm text-gray-500">Optimization</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($user->status === 'active')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                        </span>
                    @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
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
                        Edit
                    </button>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.deleteRole', $user->id) }}" method="POST" class="inline delete-role-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="ml-2 text-red-600 hover:text-red-900 delete-role-btn" data-id="{{ $user->id }}">
                            Delete
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
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {

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
            button.addEventListener('click', function () {
                const userId = this.getAttribute('data-id');
                const username = this.getAttribute('data-username');
                const type = this.getAttribute('data-type');

                // Populate the modal with user data
                userIdInput.value = userId;
                usernameInput.value = username;
                typeSelect.value = type;

                // Show the modal
                modal.classList.remove('hidden');
            });
        });
        
        cancelBtn.addEventListener('click', function () {
            modal.classList.add('hidden');
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const userId = userIdInput.value;
            const formData = new FormData(form);

            fetch(`/admin/update-role/${userId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Role updated successfully!');
                    location.reload();
                } else {
                    alert('Failed to update role.');
                }
            })
            .catch(error => console.error('Error:', error));
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                deleteForm = this.closest('.delete-role-form'); // Get the parent form
                deleteModal.classList.remove('hidden'); // Show the delete confirmation modal
            });
        });

        cancelDeleteBtn.addEventListener('click', function () {
            deleteModal.classList.add('hidden'); // Hide the delete confirmation modal
        });

        confirmDeleteBtn.addEventListener('click', function () {
            if (deleteForm) {
                deleteForm.submit(); // Submit the form if confirmed
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-role-btn');
        const deleteModal = document.getElementById('deleteRoleModal');
        const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        let formToSubmit = null;

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('.delete-role-form'); // Get the parent form
                formToSubmit = form; // Store the form to submit later

                // Show the delete confirmation modal
                deleteModal.classList.remove('hidden');
            });
        });

        cancelDeleteBtn.addEventListener('click', function () {
            // Hide the delete confirmation modal
            deleteModal.classList.add('hidden');
            formToSubmit = null; // Reset the form reference
        });

        confirmDeleteBtn.addEventListener('click', function () {
            if (formToSubmit) {
                formToSubmit.submit(); // Submit the form if confirmed
            }
        });
    });
</script>
@endsection
