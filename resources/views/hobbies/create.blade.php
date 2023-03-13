<a href="{{ route('hobbies.index') }}">&gt; 戻る</a>

<form action="{{ route('hobbies.store') }}" method='POST'>
  @csrf

  <div>
    <label>name</label>
    <input type="text" name="name" placeholder='例）サッカー'>
  </div>
  <div>
    <p>カテゴリーを選択してください</p>
    <select name="category_id">
      @foreach ($category_hobbies as $category_hobby)
      <option value="{{ $category_hobby->category_id }}">{{ $category_hobby->id }}</option>
      @endforeach
    </select>
  </div>
  <div>
    <label for="title1">タイトル</label>
    <input type="text" name='title' id='title1' placeholder='タイトルを入力してください（必須）'>
  </div>
  <div>
    <label for="image">画像を入力してください</label>
    <input type="file" name='image' accept='.png, .jpg, .jpeg, .pdf, .doc'>
  </div>
  <div>
    <label for="content1">内容</label>
    <textarea name="content" id="content1" cols="100" rows="10" placeholder='内容を入力してください'></textarea>
  </div>
  <div>
    <p>場所を登録してください</p>
  </div>
  <div>
    <button type='submit'>作成</button>
  </div>
</form>

