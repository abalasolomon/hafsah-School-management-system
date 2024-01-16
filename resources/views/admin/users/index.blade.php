<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-end p-2">
                    <a href="{{ route('admin.users.index')}}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md"> Create Role</a>
                </div>
                <div class="flex flex-col">
                    <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase ">Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase ">Email</th>
                                            <th scope="col" class="relative px-6 py-3 ">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="item flex-center">
                                                {{ $user->name }}
                                                </div>    
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="item flex-center">
                                                {{ $user->email }}
                                                </div>    
                                            </td>
                                            <td>
                                                <div class="flex justify-end">
                                                    <div class="flex space-x-2">
                                                        <a href="{{ route('admin.roles.edit', $user->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Edit</a>
                                                        <a href="{{ url('admin/users', $user->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Roles</a>                                                        
                                                        <form 
                                                        class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                                        action="{{ route('admin.users.destroy', $user->id) }}" 
                                                        onsubmit="return confirm('are you sure?')"
                                                        method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
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
    </div>
</x-admin-layout>
