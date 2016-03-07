<?php
use Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/9/16
 * Time: 7:21 PM
 */
class BaseModel
{
    private $data;

    public function __construct($data)
    {

        $this->data = $data;
    }

    /**
     * Get the id of the current post.
     *
     * @return int The ID of the current post.
     */
    public function id()
    {
        return $this->data->ID;
    }

    /**
     * Get the title of the current post.
     *
     * @return string The title of the current post.
     */
    public function title()
    {
        return $this->data->post_title;
    }

    public function slug()
    {
        return $this->data->post_name;
    }

    public function type()
    {
        return $this->data->post_type;
    }


    public function authorId()
    {
        return $this->data->post_author;
    }


    /**
     * Get the author of the current post.
     *
     * @return string The author of the current post.
     */
    public function author()
    {
        return the_author($this->id());
    }

    /**
     * Get the content of the current post.
     *
     * @return string The content of the current post.
     */
    public function content()
    {
        $content = apply_filters('the_content', $this->data->post_content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }

    /**
     * Get the excerpt of the current post.
     *
     * @return string The excerpt of the current post.
     */
    public function excerpt($word_count = 40)
    {
        return wp_trim_words(empty($this->data->post_excerpt) ?  wp_trim_excerpt(wp_strip_all_tags( $this->content())): $this->data->post_excerpt, $word_count) ;
    }

    /**
     * Get the post thumbnail of the current post.
     *
     * @param string|array The size of the current post thumbnail.
     * @param string|array The attributes of the current post thumbnail.
     * @return string The thumbnail of the current post.
     */
    public function thumbnail($size = null, $attr = null)
    {
        return get_the_post_thumbnail($this->id(), $size, $attr);
    }

    /**
     * Get thumbnail url of current post.
     *
     * @param string|array $size The size of the current post thumbnail.
     * @param bool $icon
     * @return null|string
     */
    public function thumbnailUrl($size = null, $icon = false)
    {
        $data = wp_get_attachment_image_src(get_post_thumbnail_id($this->id()), $size, $icon);

        return (empty($data)) ? null : $data[0];
    }

    /**
     * Get the permalink of the current post.
     *
     * @return string The permalink of the current post.
     */
    public function link()
    {
        return get_permalink($this->id());
    }

    /**
     * Get the categories of the current post.
     *
     * @param int $id The post ID.
     * @return array The categories of the current post.
     */
    public function category()
    {
        return collect(get_the_category($this->id()));
    }

    /**
     * Get the tags of the current post.
     *
     * @return array The tags of the current post.
     */
    public function tags()
    {
        return get_the_tags($this->id());
    }

    /**
     * Get the terms (custom taxonomies) of the current post.
     *
     * @param string $taxonomy The custom taxonomy slug.
     * @see https://codex.wordpress.org/Function_Reference/get_the_terms
     * @return array|false|\WP_Error
     */
    public function terms($taxonomy)
    {
        return get_the_terms($this->id(), $taxonomy);
    }

    public function termsLink($term, $taxonomy)
    {
        return get_term_link($term, $taxonomy);
    }

    /**
     * Get the date of the current post.
     *
     * @return string The date of the current post.
     */
    public function date()
    {
        return Carbon::parse($this->data->post_date);
    }

    /**
     * Add the classes for a given post.
     *
     * @author Guriev Eugen
     * @param string|array $class One or more classes to add to the post class list.
     * @param int|\WP_Post $post_id The post ID or the post object.
     * @return string
     */
    public function postClass($class = '', $post_id = null)
    {
        return join(' ', get_post_class($class, $post_id));
    }

    public function status()
    {
        return $this->data->post_status;
    }

    public function parent()
    {
        return $this->data->post_parent;
    }

    public function modified()
    {
        return Carbon::parse($this->data->post_modifed);
    }

    public function commentCount()
    {
        return $this->data->comment_count;
    }

    /**
     * @param mixed $data
     * @return BaseModel
     */
    public static function set($data)
    {
        return new self($data);
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->data;
    }
}