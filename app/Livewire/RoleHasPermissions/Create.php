<?php

namespace App\Livewire\RoleHasPermissions;

use App\Livewire\Forms\RoleHasPermissionForm;
use App\Models\RoleHasPermission;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    public RoleHasPermissionForm $form;

    public function mount(RoleHasPermission $roleHasPermission)
    {
        $this->form->setRoleHasPermissionModel($roleHasPermission);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('role-has-permissions.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.role-has-permission.create');
    }
}
