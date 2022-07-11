<?php
require_once dirname(__FILE__) . "/../model/categorie.php";
require_once dirname(__FILE__) . "/../model/member.php";
require_once dirname(__FILE__) . "/../model/product.php";
require_once dirname(__FILE__) . "/../database/database.php";
// Vergeet niet om de nodige bestanden te importeren

class HalloweenRepository
{
    public static function getAllProducts(){
        $arr = Database::getRows("SELECT * FROM producten", null, "Product");
        return $arr;
    }

    public static function getProductById($parID){
        $item = Database::getSingleRow("SELECT * FROM producten WHERE id=?", [$parID], "Product");
        return $item;
    }

    public static function getAllCategories(){
        $arr = Database::getRows("SELECT * FROM categorie", null, "Categorie");
        return $arr;
    }

    public static function getProductsByCategoryID($catID){
        $arr = Database::getRows("SELECT * FROM producten WHERE catID=?", [$catID], "Product");
        return $arr;
    }
    
    public static function updateProduct( $parTitel, $parOmschrijving, $parKostprijs , $parAfbeelding,  $parCategorieID, $parID){
        $item = Database::execute("UPDATE producten SET titel=?, omschrijving=?, kostprijs=?, afbeelding=?, catID=? WHERE ID=?", [$parTitel, $parOmschrijving, $parKostprijs, $parAfbeelding, $parCategorieID, $parID]);
        return $item;
    }
    
    public static function createProduct($parTitel, $parOmschrijving, $parKostprijs, $parAfbeelding,  $parCategorieID){
        $item = Database::execute("INSERT INTO producten(titel, omschrijving, kostprijs, afbeelding, catID) VALUES(?,?,?,?,?)", [$parTitel, $parOmschrijving, $parKostprijs, $parAfbeelding, $parCategorieID]);
        return $item;
    }
   
    public static function deleteProduct($id){
        $item = Database::execute("DELETE FROM product WHERE id=?", [$id]);
        return $item;
    }

    public static function getMemberByLogin($login){
        $item = Database::getSingleRow("SELECT * FROM members WHERE naam=?", [$login]);
        return $item;
    }

    public static function getAllMembers(){
        $arr = Database::getRows("SELECT * FROM members", null, "Member");
        return $arr;
    }
}
?>