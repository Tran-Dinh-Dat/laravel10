<div>
	<h2>Todo List</h2>
   <!-- ①Todo登録部分-->
    <input type="text" wire:model="todo">
    <button wire:click="addTodo">登録</button>

    <!-- ② 未完了Todoの表示部分-->
    <h2>未完了</h2>
    <ul>
        @foreach($undoneTodos as $todo)
        <li>
            <button wire:click="updateTodo({{ $todo->id }} , true)">完了</button>
            {{ $todo->todo }}
        </li>
        @endforeach
    </ul>

    <!-- ③完了済のTodo表示部分 -->
    @if($isShowDoneTodos)
        <button wire:click="showDoneTodos(false)">完了したTodoを隠す</button>
        <h2>完了</h2>
        <ul>
            @foreach($doneTodos as $todo)
            <li>
                <button wire:click="updateTodo({{ $todo->id }}, false)">取り戻し</button>
                {{ $todo->todo }}
            </li>
            @endforeach
        </ul>
    @else
        <button wire:click="showDoneTodos(true)">完了したTodoを表示する</button>
    @endif
</div>