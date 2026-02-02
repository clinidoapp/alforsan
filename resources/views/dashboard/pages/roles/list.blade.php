@extends('layouts.dashboard')
@section('title', 'Dashboard - Roles')
@section('page-title', 'Roles Management')
@section('content')
<section class="listing">
   <div class="container-fluid">
      <div class="row">
         <div class="d-flex mb-2 justify-content-between">
            <h3>Roles</h3>
            <a href="{{ route('roles-add') }}" class="btn btn-primary-custom text-white px-5">
               <i class="fa-solid fa-plus text-white"></i> Add
            </a>
         </div>

         <div class="card p-3">
            <form method="POST" action="{{ route('update-role') }}" id="rolesForm">
               @csrf
               <div class="table-responsive">
                  <div class="d-flex justify-content-between mb-3">
                     <h3>Permissions</h3>
                     <button id="saveRoles" type="submit" class="btn btn-success px-4">Save Changes</button>
                  </div>

                   @if ($errors->any())
                       <div class="alert alert-danger">
                           <ul class="mb-0">
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                   @endif

                  <table class="table border-0 align-middle text-center">
                     <thead class="table-primary">
                        <tr>
                           <th class="text-start sticky-col">Permission</th>
                           @foreach ($roles as $role)
                              <th class="sticky-col">{{ $role->name }}</th>
                           @endforeach
                        </tr>
                     </thead>

                     <tbody>
                        @foreach ($permissions as $group)
                        {{-- Category row --}}
                        <tr>
                           <td colspan="{{ count($roles) + 1 }}" class="text-start fw-bold bg-white border-0 pb-2">
                              {{ $group['category_name'] }}
                           </td>
                        </tr>

                        {{-- Permission rows --}}
                        @foreach ($group['permissions'] as $permission)
                        <tr>
                           <td class="text-start border-0">{{ $permission['name'] }}</td>

                           @foreach ($roles as $role)
                          <td class="border-0" style="justify-items: center;">
                            <label class="fa-checkbox">
                                <input
                                    type="checkbox"
                                    name="permissions[{{ $role->id }}][]"
                                    value="{{ $permission['id'] }}"
                                    {{ in_array($permission['slug'], $rolePermissions[$role->slug] ?? []) ? 'checked' : '' }}
                                >
                                <span class="checkmark"></span>
                            </label>
                            </td>
                           @endforeach
                        </tr>
                        @endforeach

                        {{-- Group separator --}}
                        <tr>
                           <td colspan="{{ count($roles) + 1 }}" class="border-0">
                              <div class="border-bottom my-1"></div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
    @if ($errors->any())
        DashboardAlert.error("{{ $errors->first() }}");
    @endif

    @if (session('success'))
        DashboardAlert.success("{{ session('success') }}");
    @endif
});
</script>
@endsection
