<?php
namespace Products\models;

use Products\core\App;

class ProductDao implements Dao
{

    public static function get($primary): array
    {
        $stmt = App::$db->query("SELECT * FROM products where sku = ?",[$primary]);

        $products = [];

        $rows = $stmt->fetchAll();

        foreach($rows as $row) {
            // todo meta
            $product = new Product($row->sku,$row->name,$row->price,[]);
            $products[] = $product;
        }

        return $products;
    }

    public static function all(): array
    {
        $stmt = App::$db->query("SELECT * FROM products",[]);

        $products = [];

        $rows = $stmt->fetchAll();
        foreach($rows as $row) {
            $product = new Product($row['sku'],$row['name'],$row['price'],[]);
            $products[] = $product;
        }

        return $products;
    }

    public static function save($item): void
    {
        App::$db->query("INSERT INTO products(sku,name,price) VALUES(?,?,?)",
            [
                $item->sku,$item->name,$item->price
            ]);

    }

    public static function update($item, array $params): void
    {
        // TODO: Implement update() method.
    }

    public static function delete($item): void
    {
        App::$db->query("DELETE FROM products WHERE sku = ?", [$item->sku]);
    }
}