<div>
    <select class="form-select" aria-label="Default select example" >
        <option selected>果物を選択してください</option>
        <!-- 修正点：optionの値を$options変数に入れ、foreachでループさせて表示します。 -->
        @foreach($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>