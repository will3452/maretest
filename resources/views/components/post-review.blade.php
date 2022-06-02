@props(['post'])
<!-- Post preview-->
<div class="post-preview">
    <a href="javascript:alert('under dev')">
        <h2 class="post-title">{{$post['title']}}</h2>
        <h3 class="post-subtitle">{{\Str::limit($post['body'], 299)}}</h3>
    </a>
    <p class="post-meta">
        Posted by
        <a href="#!">Demo User</a>
        on {{$post['created_at']}}
    </p>
</div>
<!-- Divider-->
<hr class="my-4" />
