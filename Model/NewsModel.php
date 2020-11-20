<?php

namespace Web2A\Model;

use DateTime;
use Web2A\Utils\Verification;

class NewsModel {
    private string $title,$description ,$link;
    private DateTime $date;

    public function __construct($title,$description,$link,$date){
        Verification::verifNews($title, $description, $link,$date);

        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->date = $date;
    }

    public function toHtmlString() : string{
        return '<div class="article-item">
                  <h3 class="section-title"><a href="' .$this->link.'">'.$this->title.'</a></h3>
                  <p>'.$this->description.'</p>
                  <p><small>'.$this->date->format("d/m/Y H:i:s").'</small></p>
                </div>';
    }

    /**
     * @return string
     */
    public function getTitle(): string{
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string{
        return $this->description;
    }

    /**
     * @return string
     */
    public function getLink(): string{
        return $this->link;
    }

    /**
     * @return DateTime
     */
    public function getDate(): string{
        return $this->date->format('Y-m-d H:i:s');
    }

}