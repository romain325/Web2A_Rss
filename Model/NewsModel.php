<?php

namespace Web2A\Model;

use DateTime;
use Web2A\Config\Verification;

class NewsModel {
    public string $title,$description ,$link, $sourceLien;
    public DateTime $date;

    public function __construct($title,$description,$link,$date,$sourceLien){

        $row = Verification::verifNews($title, $description, $link, $date, $sourceLien);

        $this->title = $row["title"];
        $this->description = $row["desc"];
        $this->link = $row["link"];
        $this->date = $row["date"];
        $this->sourceLien = $row["source"];
    }

    public function toHtmlString() : string{
        return '<div class="article-item">
                  <h3 class="section-title"><a href="' .$this->link.'">'.$this->title.'</a></h3>
                  <p>'.$this->description.'</p>
                  <p><small>'.$this->date->format("d/m/Y H:i:s").'</small></p>
                  <p><small>Origine:<a href="'.$this->sourceLien.'">'.$this->sourceLien.'</a></small></p>
                </div>';
    }

}