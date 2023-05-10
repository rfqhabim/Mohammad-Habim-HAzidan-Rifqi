<?php
require_once('product.php');

class CDMusic extends Product{
    private $artist,
            $genre;
    
    public function setArtist($artist)
        {
            $this->artist = $artist;
        }
    
    public function getArtist()
        {
            return $this->artist;
        }
    
    public function setGenre($genre)
        {
            $this->genre = $genre;
        }

    public function getGenre()
        {
            return $this->genre;
        }

    public function getPrice()
        {
            return $this->price + ($this->price * 10/100);
        }
        
    public function getDiscount()
        {
            return $this->discount + 5;
        }
    }