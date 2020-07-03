<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Message::class);
    }
    /**
     * Вывести перечень ресурсов (сообщений в блоге).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Выбираем из БД все сообщения.
        $messages = Message::all();

        // Выводим перечень сообщений.
        return view('messages.index', [
            'messages' => $messages,
        ]);
    }

    /**
     * Вывести форму для создания нового ресурса (сообщения в блоге).
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Создаём новое сообщение в оперативной памяти.
        $message = new Message();

        // Выводим форму создания сообщения.
        return view('messages.create', [
            'message' => $message,
        ]);
    }

    /**
     * Сохранить новый ресурс (сообщение в блоге) в БД.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        // Извлекаем поля формы из запроса.
        $attributes = $request->only(['title', 'content']);

        $attributes['user_id'] = $request->user()->id;

        // Сохраняем сообщение в БД.
        $message = Message::create($attributes);

        // Перенаправляем клиент на страницу с конкретным сообщением.
        return redirect(route('messages.show', $message->id));
    }

    /**
     * Вывести конкретный ресурс (одно сообщение в блоге).
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        // Выводим страницу с конкретным сообщением.
        return view('messages.show', [
            'message' => $message,
        ]);
    }

    /**
     * Показать форму для редактирования конкретного ресурса (сообщения в блоге).
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        // Выводим форму редактирования сообщения.
        return view('messages.edit', [
            'message' => $message,
        ]);
    }

    /**
     * Обновить ресурс (сообщение в блоге) в БД.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        // Извлекаем поля формы из запроса.
        $attributes = $request->only(['title', 'content']);

        // Обновляем сообщение в БД.
        $message->update($attributes);

        // Перенаправляем клиент на страницу с перечнем сообщений.
        return redirect(route('messages.index'));
    }

    /**
     * Показать форму для удаления указанного ресурса.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function remove(Message $message)
    {
        $this->authorize('delete', $message);
        // Выводим форму удаления сообщения.
        return view('messages.remove', [
            'message' => $message,
        ]);
    }

    /**
     * Удалить конкретный ресурс (сообщение в блоге) из БД.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        // Удаляем сообщение из БД.
        $message->delete();

        // Перенаправляем клиент на страницу с перечнем оставшихся сообщений.
        return redirect(route('messages.index'));
    }
}
