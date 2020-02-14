@extends('template_blog.content')

                                        @section('isi')
                                            
                                        @foreach ($data as $artikel_terbaru)
                                        <div class="col-md-4 mb-4">
                                            <div class="box card h-100">
                                                <a
                                                    href="{{ route('blog.isi', $artikel_terbaru->slug ) }}">
                                                    <img class="card-img-top img-fluid"
                                                        src="{{ $artikel_terbaru->gambar }}"
                                                        alt="{{ $artikel_terbaru->judul }}">
                                                </a>
                                                <div class="card-body">
                                                    @foreach ($artikel_terbaru->tags as $tag)
                                                    <span class="category category--color">
                                                        {{ str_limit($tag->name, 40) }}
                                                    </span>
                                                    @endforeach
                                                    <a href="{{ $artikel_terbaru->slug }}"
                                                        title="{{ $artikel_terbaru->judul }}">
                                                        <h4 class="card-title">
                                                            {{ str_limit($artikel_terbaru->judul, 30) }}
                                                        </h4>
                                                    </a>
                                                    <div class="info-desc mb-4">
                                                        <span><i class="fa fa-calendar"></i>
                                                            <time datetime="date_to_xmlschema"
                                                                itemprop="datePublished">{{ $artikel_terbaru->created_at->diffForHumans() }}
                                                            </time>
                                                        </span>
                                                    </div>
                                                    <p class="card-text">
                                                        {{ str_limit($artikel_terbaru->content, 200) }}
                                                    </p>
                                                </div>
                                                <div class="card-footer text-muted">
                                                    <ul class="statistic">
                                                        <li class="likes">
                                                            <a href="#"><i class="fa fa-eye"></i></a>
                                                            <span>391</span>
                                                        </li>
                                                        <li class="comments">
                                                            <a
                                                                href="https://daengweb.id/mengenal-widget-flutter-11-crud-data-pegawai-part-3/#disqus_thread"><i
                                                                    class="fa fa-comments-o"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        @endsection

                                        
                                        