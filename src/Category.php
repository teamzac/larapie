<?php

namespace TeamZac\LaraPie;

class Category
{
    public static function collection($categories)
    {
        return collect($categories)->map(function($category) {
            return $category->get_term();
        });
    }
}
