<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <hr class="hr-primary"/>
        <ol class="breadcrumb bread-primary">
            <button href="#" class="btn btn-primary">
                <i class="fa fa-tags"></i>
                <?php _e('Tags', THEME_TEXT_DOMAIN) ?>
            </button>
            @foreach($tags as $item)
            <li><a href="{{get_term_link($item)}}" title="{{$item->name }}" rel="tag">{{$item->name }}</a></li>
            @endforeach
        </ol>
    </div>
</div>