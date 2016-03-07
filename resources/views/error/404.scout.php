@extends('layouts.default')

@section('content')
<div class="error">
    <div class="error-code m-b-10 m-t-20">404 <i class="fa fa-warning"></i></div>
    <h3 class="font-bold"><?php _e("We couldn't find the page..", THEME_TEXT_DOMAIN) ?></h3>

    <div class="error-desc">
        <?php _e("Sorry, but the page you are looking for was either not found or does not exist.", THEME_TEXT_DOMAIN) ?> <br/>
        <?php _e("Try refreshing the page or click the button below to go back to the Homepage.", THEME_TEXT_DOMAIN) ?>
        <div>
            <a class=" login-detail-panel-button btn" href="{{ esc_url( home_url() ) }}">
                <i class="fa fa-arrow-left"></i>
                <?php _e("Go back to Homepage", THEME_TEXT_DOMAIN) ?>
            </a>
        </div>
    </div>
</div>
@stop



