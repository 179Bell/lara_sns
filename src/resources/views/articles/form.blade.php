@csrf
<div class="md-form">
  <label>タイトル</label>
  <input type="text" name="title" class="form-control" value="{{ $article->title ?? old('title') }}">
</div>
<div class="text-danger">
    <p>{{ $errors->first('title')}} </p>
</div>
<div class="form-group">
  <article-tags-input
  :initial-tags='@json($tagNames ?? [])'
  >
  </article-tags-input>
</div>
<div class="form-group">
  <label></label>
  <textarea 
    name="body" 
    class="form-control" 
    rows="16" 
    placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
    <div class="text-danger">
        <p>{{ $errors->first('body') }}</p>
    </div>
</div>