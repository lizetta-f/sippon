<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Вывести перечень ресурсов (ролей).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Выбираем из БД все сообщения.
        $roles = Role::all();

        // Выводим перечень сообщений.
        return view('roles.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Вывести форму для создания нового ресурса (роли).
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Создаём новое сообщение в оперативной памяти.
        $role = new Role();

        // Выводим форму создания сообщения.
        return view('roles.create', [
            'role' => $role,
        ]);
    }

    /**
     * Сохранить новый ресурс (сообщение в блоге) в БД.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        // Извлекаем поля формы из запроса.
        $attributes = $request->only(['name']);

        // Сохраняем сообщение в БД.
        $role = Role::create($attributes);

        // Перенаправляем клиент на страницу с конкретной ролью.
        return redirect(route('roles.show', $role->id));
    }

    /**
     * Вывести конкретный ресурс (одна роль).
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // Выводим страницу с конкретной ролью.
        return view('roles.show', [
            'role' => $role,
        ]);
    }

    /**
     * Показать форму для редактирования конкретного ресурса (роли).
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // Выводим форму редактирования роли.
        return view('roles.edit', [
            'role' => $role,
        ]);
    }

    /**
     * Обновить ресурс (роль) в БД.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // Извлекаем поля формы из запроса.
        $attributes = $request->only(['name']);

        // Обновляем сообщение в БД.
        $role->update($attributes);

        // Перенаправляем клиент на страницу с перечнем сообщений.
        return redirect(route('roles.index'));
    }

    /**
     * Показать форму для удаления указанного ресурса.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function remove(Role $role)
    {
        // Выводим форму удаления роли.
        return view('roles.remove', [
            'role' => $role,
        ]);
    }

    /**
     * Удалить конкретный ресурс (роль) из БД.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // Удаляем сообщение из БД.
        $role->delete();

        // Перенаправляем клиент на страницу с перечнем оставшихся ролей.
        return redirect(route('roles.index'));
    }
}
