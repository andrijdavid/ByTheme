<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <hr class="hr-danger"/>

        <ol class="breadcrumb bread-danger ">
            <button href="#" class="btn btn-danger"><i class="fa fa-newspaper-o"></i>
                <?php _e('Categories', THEME_TEXT_DOMAIN) ?>
            </button>
            @foreach($categories as $item)
            <li><a href="{{get_term_link($item)}}" rel="category" title="{{ $item->name }}">{{$item->name}}</a>
            </li>
            @endforeach
        </ol>
    </div>
</div>