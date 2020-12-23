<?php


namespace Web2A\Parser;

use Exception;
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
            try{
                array_push($arr, $this->modelFromArticle($art) );
            }catch(Exception $e){
                continue;
            }
        }
        return $arr;
    }

    public function getNArticles($n) :array {
        $arr = [];
        for ($i = 0; $i < $n; $i++){
            $art = $this->parser->channel->item[$i];
            try{
                array_push($arr, $this->modelFromArticle($art) );
            }catch(Exception $e){
                continue;
            }
        }
        return $arr;
    }

    private function modelFromArticle($art) : NewsModel {
        return new NewsModel($art->title, $art->description, $art->link, date_timestamp_set(new \DateTime(),strtotime($art->pubDate)), $this->source);
    }


}