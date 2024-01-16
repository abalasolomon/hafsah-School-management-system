<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md"> Role Page</a>
                </div>
                <div class="flex flex-col p-2 bg-slate-100">
                  <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="post" action="{{ route('admin.roles.update', $role->id) }}">
                      @csrf
                      @method('put')
                      <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700"> Role Name </label>
                        <div class="mt-1">
                          <input 
                          type="text" 
                          id="name"
                          value="{{$role->name}}" 
                          name="name"
                          class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('name')
                            <span class="text-red-400 text-sm" >{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="sm:col-span-6 pt-5">
                        <button class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                      </div>
                    </form>
                  </div>                  
                </div>
                <div class="mt-6 mt-2 p-2 bg-slate-100">
                  <h2 class="text-2xl font-semibold">Role Permissions</h2>
                  <div class="mt-2 p2">
                    @if ($role->permissions)
                      @foreach ($role->permissions as $role_permission)
                      <div class="flex space-x-2">
                        <form 
                        class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                        action="{{ route('admin.roles.permission.revoke', [$role->id, $role_permission->id]) }}"
                        method="post"
                         onsubmit="return confirm('are you sure you want to rovoke this permission?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">{{ $role_permission->name }}</button>
                        </form>
                    </div>
                          
                      @endforeach
                        
                    @endif
                  </div>
                  <div class="max-w-xl">
                    <form method="post" action="{{ route('admin.roles.permission', $role->id) }}">
                      @csrf
      
                      <div class="sm:col-span-6">
                        <label for="permission" class="block text-sm font-medium text-gray-700">permission</label>
                        <select name="permission" id="permission" class="mt-1 block w-full py-2 px-3">
                          @foreach ($permissions as $permission)
                          <option value="{{ $permission->name }}"> {{ $permission->name }} </option>
                              
                          @endforeach
                        </select>
                        @error('name')
                            <span class="text-red-400 text-sm" >{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="sm:col-span-6 pt-5">
                        <button class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign Role</button>
                      </div>
                    </form>
                  </div>
                </div>


            </div>
        </div>
    </div>
</x-admin-layout>
