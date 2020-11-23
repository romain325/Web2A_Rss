<?php


namespace Web2A\Utils;

use SimpleXMLElement;
use Web2A\Model\NewsModel;

class RssParser {
    private SimpleXMLElement $parser;
    private string $source;

    public function __construct($source){
        $this->source = $source;
        $this->parser = new SimpleXMLElement(file_get_contents($source));
    }

    public function getAllArticles() : array{
        $arr = [];
        foreach ($this->parser->channel->item as $art){
            array_push($arr, $this->modelFromArticle($art));
        }
        return $arr;
    }

    public function getNArticles($n) :array {
        $arr = [];
        for ($i = 0; $i < $n; $i++){
            $art = $this->parser->channel->item[$i];
            array_push($arr, $this->modelFromArticle($art) );
        }
        return $arr;
    }

    private function modelFromArticle($art) : NewsModel {
        return new NewsModel($art->title, $art->description, $art->link, date_timestamp_set(new \DateTime(),strtotime($art->pubDate)), $this->source);
    }


}