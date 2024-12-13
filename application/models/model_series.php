<?php
class model_series extends CI_Model
{
    public function index()
    {
        $this->db->SELECT('category.category AS CategoryName, productdetails.*');
        $this->db->FROM('category');
        $this->db->JOIN('productdetails', 'productdetails.category_id = category.category_id');
        $result = $this->db->GET();
        return $result->result_array();
    }

    public function category()
    {
        $category = $this->db->GET('category');
        return $category->result_array();
    }

    public function itemByCatg()
    {
        $this->db->SELECT('category.category AS CategoryName, productdetails.Image AS ItemImage,productdetails.*');
        $this->db->FROM('category');
        $this->db->JOIN('productdetails', 'productdetails.category_id = category.category_id');
        $result = $this->db->GET();

        $groupedProduct = [];

        foreach ($result->result_array() as $row) {
            $Image = $row['ItemImage'];
            if (!isset($groupedProduct[$row['CategoryName']])) {
                $groupedProduct[$row['CategoryName']] = [
                    'image' => $Image,
                    'items' => []
                ];
            }
            $groupedProduct[$row['CategoryName']]['items'][] = [
                'ItemId' => $row['ItemId'],
                'ItemName' => $row['ItemName'],
                'Price' => $row['Price'],
                'Image' => $row['Image'],
            ];
        }
        return $groupedProduct;
    }
}
