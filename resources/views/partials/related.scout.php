<?php
if (!isset($posts) && empty($posts)) {
    $tags = wp_get_post_tags($id);
    $t = [];
    if(!isset($nb)) $nb = 4;
    foreach ($tags as $tag) {
        $t[] = $tag->term_id;
    }
    $args = [
            'tag__in' => $t,
            'post__not_in' => array($id),
            'post_type'=> 'post',
            'posts_per_page' => $nb,
            'post_status' => 'publish'
    ];
    $query = new Query($args);
    $posts = $query->get();
}
?>
<div class="container-fluid">
    @foreach($posts as $item)
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 col-md-10 col--md-offset1 col-sm-12 col-xs-12 p-10">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="{{$item->link()}}">
                            @if(empty($item->thumbnailUrl('relatedPostThumbnail')))
                                <img src="{{\Themosis\Page\Option::get("theme-option-theme", "defaultSlider") }}" alt="{{ $item->title() }}">
                            @else
                                <img src="{{$item->thumbnailUrl('relatedPostThumbnail')}}" alt="{{$item->title()}}"
                                     class="media-object img-circle" width="100px" height="100px">
                            @endif
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading text-justify">
                            <a href="{{$item->link()}}">{{$item->title()}}</a>
                        </h4>
                        <p class="text-justify">
                            {{$item->excerpt()}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>