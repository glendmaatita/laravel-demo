{!! csrf_field() !!}
<div class="form-group">
    <label for="url" class="control-label">Url</label>
    <input type="url" name="url" id="url" value="{{ old('url', @$page->url) }}" placeholder="url" required class="form-control">
</div>

<div class="form-group">
    <label for="name" class="control-label">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', @$page->name) }}" placeholder="name" required class="form-control">
</div>

<div class="form-group">
    <label for="title" class="control-label">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title', @$page->title) }}" placeholder="title" required class="form-control">
</div>

<div class="form-group">
    <label for="content" class="control-label">Content</label>
    <textarea name="content" id="content" placeholder="content" required class="form-control">{{ old('content', @$page->content) }}</textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Save</button>
    <a href="/page" class="btn btn-default">Back to list</a>
</div>

