<div>
    <h2>Edit Hobby</h2>
</div>
<a href="{{ route('hobbies.index') }}">&gt; 戻る</a>

<form action="{{ route('hobbies.update', $hobby->id) }}" method='POST'>
  @csrf
  @method('PUT')

  <div>
    <p>カテゴリーを選択してください</p>
    <select name="name">
      <option value="">カテゴリーを選択してください</option>
      <option value="baseball">野球</option>
      <option value="soccer">サッカー</option>
    </select>
  </div>
  <div>
    <label for="title1">タイトル</label>
    <input type="text" name='title' id='title1' placeholder='タイトルを入力してください（必須）' value='{{ $hobby->title }}'>
  </div>
  <div>
    <label for="image">画像を入力してください</label>
    <input type="file" name='image' accept='.png, .jpg, .jpeg, .pdf, .doc' value='{{ $hobby->image }}'>
  </div>
  <div>
    <label for="content1">内容</label>
    <textarea name="content" id="content1" cols="100" rows="10" placeholder='内容を入力してください'>{{ $hobby->content }}</textarea>
  </div>
  <div>
    <p>場所を登録してください</p>
  </div>
  <div>
    <button type='submit'>更新</button>
  </div>
</form>
