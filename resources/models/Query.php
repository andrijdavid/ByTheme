<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/9/16
 * Time: 7:15 PM
 */
class Query
{
    protected $query;

    protected $res = [];

    public function __construct(array $data)
    {
        $this->setQuery(new WP_Query($data));
        $this->extract($this->getQuery()->get_posts());
    }

    private function extract($posts){
        foreach($posts as $post){
           $this->addToRes(new BaseModel($post));
        }
        return $this;
    }

    private function addToRes(BaseModel $model){
        $this->res[] = $model;
        return $this;
    }

    /**
     * @param WP_Query $query
     * @return Query
     */
    public function setQuery(WP_Query $query)
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return WP_Query
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->res;
    }
}