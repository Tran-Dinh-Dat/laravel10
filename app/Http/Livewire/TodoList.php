<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoList extends Component
{
    public $todo; // ①のテキストボックスとバインドするプロパティ
    public $undoneTodos; // ②の未完了Todoとバインドするプロパティ
    public $doneTodos; // ③の完了済リストのプロパティ
    public $isShowDoneTodos = false; //③で完了済Todoの表示非表示を制御するフラグ。デフォルトは非表示。

    public function render()
    {
        return view('livewire.todo-list')->extends('layouts.app');
    }

    // 画面表示時の処理
    public function mount()
    {
        $this->getTodos();
    }

    // 未完了、完了済のTodoを取得
    public function getTodos()
    {
        $this->undoneTodos = Todo::where('done', false)->get();
        $this->doneTodos = Todo::where('done', true)->get();
    }

    // Todoを登録する。①の登録ボタンクリック時にコールする
    public function addTodo()
    {
        // todoを登録
        $todo = new Todo();
        $todo->todo = $this->todo;
        $todo->done = false;
        $todo->save();

        // 入力欄をクリア
        $this->todo = null;

        // データを再取得
        $this->getTodos();
    }

    // Todoの状態を更新する。②の完了ボタン、③の取り戻しボタンクリック時にコールする
    public function updateTodo($id, $isFinished)
    {
        // Todoを更新
        $todo = Todo::find($id);
        $todo->done = $isFinished;
        $todo->save();

        // データを再取得
        $this->getTodos();
    }

    // 完了済のTodoの表示非表示を切り替え
    public function showDoneTodos($isShow)
    {
        $this->isShowDoneTodos = $isShow;
    }
}
