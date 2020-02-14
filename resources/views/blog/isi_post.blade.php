@foreach ($data as $isi_post)
    {{ $isi_post->judul }}
    <br>
    <br>
    {{ $isi_post->content }}
@endforeach