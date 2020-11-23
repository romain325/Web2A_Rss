<?php


namespace Web2A\Model;


class SourceModel {
    private string $nom, $lien;
    private int $id;

    public function __construct(string $id, string $nom,string $lien){
        $this->nom = $nom;
        $this->lien = $lien;
        $this->id = $id;
    }

    public function toHtmlString() : string {
        return '<form class="lined_item" action="./?page=admin" method="post">
                    <div class="lined_meta">
                        <h2 class="lined_title">['.$this->id.']: '.$this->nom.'</h2>
                        <input type="hidden" name="idSource" value="'.$this->id.'">
                    </div>
                    <div class="lined_callout">
                        <a href="'.$this->lien.'" style="color: white">'.$this->lien.'</a>
                        <input type="submit" value="Delete" class="delete">
                    </div>
                </form>';
    }
}