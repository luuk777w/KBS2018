<?php

namespace App\Models;

use Core\Model;

class Admin extends Model
{

    /**
     * *****************************
     * Recommended PRODUCTS
     * *****************************
     */

    public function addRecommendedProductById($id) {
        return $this->db->sql("INSERT into `X-RecommendedProducts`(ProductID)
                                VALUES (?)", [$id]);
    }

    public function getRecommendedProductById($id) {
        return $this->db->sql("SELECT * FROM `X-RecommendedProducts` AS P
                                JOIN stockitems SI ON P.ProductID = SI.StockItemID
                                WHERE P.ProductID = ?", [$id]);
    }

    public function removeRecommendedProductById($id) {
        return $this->db->sql("DELETE FROM `X-RecommendedProducts` WHERE ProductId = ?", [$id]);    
    }

    /**
     * *****************************
     * CAROUSEL PRODUCTS
     * *****************************
     */

    public function addCarouselProductById($id) {
        return $this->db->sql("INSERT into `X-CarouselProducts`(ProductID)
                                VALUES (?)", [$id]);    
    }

    public function getCarouselProductById($id) {
        return $this->db->sql("SELECT * FROM `X-CarouselProducts` AS P
                                JOIN stockitems SI ON P.ProductID = SI.StockItemID
                                WHERE P.ProductID = ?", [$id]);
    }

    public function removeCarouselProductById($id) {
        return $this->db->sql("DELETE FROM `X-CarouselProducts` WHERE ProductID = ?", [$id]);    
    }

    /**
     * *****************************
     * OTHER
     * *****************************
     */
}