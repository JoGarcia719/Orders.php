<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'shipper_id',
        'order_status',
        'order_date',
        'shipped_date',
        'shipping_fee',
        'order_price'
    ];

    public function getId(){
        return $this->id;
    }

    public function getCustomerId(){
        return $this->customer_id;
    }

    public function setCustomerId($value){
        $this->customer_id = $value;
        return $this->save();
    }

    public function getShipperId(){
        return $this->shipper_id;
    }

    public function setShipperId($value){
        $this->shipper_id = $value;
        return $this->save();
    }
    
    public function getStatus(){
        return $this->status;
    }

    public function setStatus($value){
        $this->status = $value;
        return $this->save();
    }

    public function getOrderDate(){
        return $this->Order_Date;
    }

    public function setOrderDate($value){
        $this->order_date = $value;
        return $this->save();
    }

    public function getShippedDate(){
        return $this->shipped_date;
    }

    public function setShippedDate($value){
        $this->shipped_date = $value;
        return $this->save();
    }

    public function getShippingFee(){
        return $this->shipping_fee;
    }

    public function setShippingFee($value){
        $this->shipping_fee = $value;
        return $this->save();
    }

    public function getPrice(){
        return $this->Price;
    }

    public function setPrice($value){
        $this->Price = $value;
        return $this->save();
    }
    

}
?>