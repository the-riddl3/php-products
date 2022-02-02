<?php
namespace Products\models;

use Products\core\App;

class ProductDao implements Dao
{

    public static function get($primary): Product
    {
        $stmt = App::$db->query("SELECT * FROM products where sku = ?",[$primary]);

        $product = $stmt->fetch();

        // query for metadata
        $stmt = App::$db->query("SELECT * FROM products_meta where product_sku = ?",[$primary]);
        $rows = $stmt->fetchAll();

        $meta = [];
        foreach($rows as $row) {
            $meta[$row['meta_name']] = $row['meta_value'];
        }

        return new Product($product['sku'],$product['name'],$product['price'],$meta);
    }

    public static function all(): array
    {
        $stmt = App::$db->query("SELECT * FROM products",[]);

        $products = [];

        $rows = $stmt->fetchAll();
        foreach($rows as $row) {
            // query for metadata
            $stmt = App::$db->query("SELECT * FROM products_meta where product_sku = ?",[$row['sku']]);
            $meta_rows = $stmt->fetchAll();

            $meta = [];
            foreach($meta_rows as $r) {
                $meta[$r['meta_name']] = $r['meta_value'];
            }

            $product = new Product($row['sku'],$row['name'],$row['price'],$meta);
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

        foreach($item->meta as $key => $value) {
            App::$db->query("INSERT INTO products_meta(product_sku,meta_name,meta_value) 
                    VALUES (?,?,?)",[$item->sku,$key,$value]);
        }
    }

    public static function update($item, array $params)
    {
        // TODO: Implement update() method.
    }

    public static function delete($item): void
    {
        App::$db->query("DELETE FROM products WHERE sku = ?", [$item->sku]);
    }
}