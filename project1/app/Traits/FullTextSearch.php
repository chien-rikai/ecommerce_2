<?php
namespace App\Traits;
trait FullTextSearch{
    protected function resolveText($keys){
        $words = explode(' ',$keys);
        foreach($words as $key=>$word){
            if (strlen($word) >= 4) {
                $words[$key] = '+'.$word.'*';
            }
        } 
        $keys = implode(' ',$words);
        return $keys;
    }
    public function scopeSearch($query, $keys)
    {
        $columns = implode(',', $this->searchable);
 
        $query->whereRaw("MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)",$this->resolveText($keys));
 
        return $query;
    }
}    