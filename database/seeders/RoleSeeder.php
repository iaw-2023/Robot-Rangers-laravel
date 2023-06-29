<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();
        Permission::truncate();

        $admin = Role::create(['name' => 'admin']);
        $empleado = Role::create(['name' => 'empleado']);
        $repositor = Role::create(['name' => 'repositor']);

        $categoriasIndex = Permission::create(['name' => 'categorias.index']);
        $categoriasCreate = Permission::create(['name' => 'categorias.create']);
        $categoriasStore = Permission::create(['name' => 'categorias.store']);
        $categoriasShow = Permission::create(['name' => 'categorias.show']);
        $categoriasEdit = Permission::create(['name' => 'categorias.edit']);
        $categoriasUpdate = Permission::create(['name' => 'categorias.update']);
        $categoriasDestroy = Permission::create(['name' => 'categorias.destroy']);

        $marcasIndex = Permission::create(['name' => 'marcas.index']);
        $marcasCreate = Permission::create(['name' => 'marcas.create']);
        $marcasStore = Permission::create(['name' => 'marcas.store']);
        $marcasShow = Permission::create(['name' => 'marcas.show']);
        $marcasEdit = Permission::create(['name' => 'marcas.edit']);
        $marcasUpdate = Permission::create(['name' => 'marcas.update']);
        $marcasDestroy = Permission::create(['name' => 'marcas.destroy']);

        $prendasIndex = Permission::create(['name' => 'prendas.index']);
        $prendasCreate = Permission::create(['name' => 'prendas.create']);
        $prendasStore = Permission::create(['name' => 'prendas.store']);
        $prendasShow = Permission::create(['name' => 'prendas.show']);
        $prendasEdit = Permission::create(['name' => 'prendas.edit']);
        $prendasUpdate = Permission::create(['name' => 'prendas.update']);
        $prendasDestroy = Permission::create(['name' => 'prendas.destroy']);
        
        $pedidosIndex = Permission::create(['name' => 'pedidos.index']);
        $pedidosShow = Permission::create(['name' => 'pedidos.show']);

        $admin->syncPermissions(
            $categoriasIndex, $categoriasCreate, $categoriasStore, $categoriasShow, $categoriasEdit, $categoriasUpdate, $categoriasDestroy,
            $marcasIndex, $marcasCreate, $marcasStore, $marcasShow, $marcasEdit, $marcasUpdate, $marcasDestroy,
            $prendasIndex, $prendasCreate, $prendasStore, $prendasShow, $prendasEdit, $prendasUpdate, $prendasDestroy,
            $pedidosIndex, $pedidosShow);

        $empleado->syncPermissions(
            $categoriasIndex, $categoriasShow,
            $marcasIndex, $marcasShow,
            $prendasIndex, $prendasCreate, $prendasStore, $prendasShow, $prendasEdit, $prendasUpdate, $prendasDestroy,
            $pedidosIndex, $pedidosShow);

        $repositor->syncPermissions(
            $categoriasIndex, $categoriasShow,
            $marcasIndex, $marcasShow,
            $prendasIndex, $prendasCreate, $prendasStore, $prendasShow, $prendasEdit, $prendasUpdate);
    }
}
