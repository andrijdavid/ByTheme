<div class="col s12 m12 l12">
    <div class="widget">
        <div class="widget-popular-posts">
            <header class="section">
                <h3> <?php _e('RECENT POSTS') ?></h3>
            </header>
            <ul class="popular-posts-list">
                @foreach($posts as $post)
                <li>
                    <div class="row">
                        <div class="popular-post-wrapper col s12">
                            <div class="popular-post-thumbnail col s3 left">
                                <a href="{{ $post->link() }}">
                                    <img width="300" height="200"
                                         src="{{ $post->thumbnailUrl('recentpostWidget')}}"
                                         class="attachment-medium wp-post-image img responsive-img transparent-overlay" alt="{{ $post->title() }}"> </a>
                            </div>
                            <div class="popular-post-title-wrapper col s9 left">
                                <a href="{{ $post->link() }}" class="popular-post-title">{{ $post->title() }}</a>
                                <div class="single-post-meta-wrapper">
                                    <span class="single-post-date">{{ $post->date()->format('d M Y') }}</span>
                                </div>
                                <a href="{{-- get_term_link($post->category()->first()) --}}"
                                   class="popular-post-category main-theme-color">{{-- $post->category()->first()->name --}}</a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>