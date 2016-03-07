<?php
if(!empty($atts) && is_array($atts)){
    $nb = 5;
    if(array_key_exists($atts, 'nb'))
    {
        if(is_numeric($atts['nb']))
            $nb = $atts['nb'];
    }
    if(array_key_exists($atts, 'type'))
    {
        switch ($atts['type']) {
            case "post":
                $p = PostModel::all($nb);
                break;
            case "gallery":
                $p = GalleryModel::all($nb);
                break;
            case "product":
                $p = ProductModel::all($nb);
                break;
            default:
                $p = PostModel::all($nb);
        }
    }
}
?>

@include('partials.recent', [
    'posts' => $p
])