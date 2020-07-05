<?php

namespace Tests\Feature;

use App\User;
use App\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MessageTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * Trait, отменяющий изменения в БД
     * после выполнения каждого тестового варианта.
     */
    //use RefreshDatabase;

    /**
     * Тестирование вставки сообщения в таблицу БД.
     *
     * @return void
     */
    public function testInsertingIntoDatabase()
    {
        // Метод factory() возвращает фабрику объектов класса Message.
        // Метод create() создаёт соответствующий кортеж в БД.
        // Ссылка на объект записывается в переменную $message.
        $message = factory(Message::class)->create();

        // $reflFunc = new \ReflectionFunction('Message::create');
        // $reflFunc = new \ReflectionMethod('\Illuminate\Database\Eloquent\Model', 'bootIfNotBooted');
        // print $reflFunc->getFileName() . ':' . $reflFunc->getStartLine();
        // die();

        // dd((Message::create(['title' => 'Тест', 'content' => 'тест', 'user_id' => factory(User::class)->create()->id]))->toArray());

        // $table = $message->getTable();
        // $message = $message->toArray();

        // dd($message);
        // unset($message['created_at']);
        // unset($message['updated_at']);

        // assertDatabaseHas() проверяет таблицу на наличие указанных данных.
        // $message->getTable() возвращает имя таблицы БД ⁠— messages.
        // $message->toArray() возвращает массив значений свойств.
        $this->assertDatabaseHas($message->getTable(), $message->toArray());
    }
}
