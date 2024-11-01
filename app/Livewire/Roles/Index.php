<?php

namespace App\Livewire\Roles;

use App\Models\Role;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Layout('layouts.app')]
    public function render(): View
    {
        $roles = Role::paginate(10);

        return view('livewire.role.index', compact('roles'))
            ->with('i', $this->getPage() * $roles->perPage());
    }

    public function delete(Role $role)
    {
        $role->delete();

        return $this->redirectRoute('roles.index', navigate: true);
    }
}
