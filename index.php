<?php
$productPrice = 500; //ราคาสินค้า
$weight = 1.5; //น้ำหนัก
$isMember =  false; // สมาชิก

$shippingFee = 0; //ค่าส่ง
$discount = 0;//การลดราคา

//  มากกว่า >
//  น้อยกว่า <  

    // 1. ค่าจัดส่ง (คิดตามน้ำหนักสินค้า):
    if(($weight >= 2)){  //หนัก 2 kg
        $shippingFee += 50;
    }else if ($weight <=10){ // น้อยกว่า10kg
        $shippingFee += 100;
    }else if($weight > 10){ //มากว่า 10kg
        $shippingFee += 200;
    }

    // 2. เงื่อนไขการส่งฟรี:
    if($productPrice >= 2000){
        $shippingFee = 0;
    }

    // 3. ส่วนลดพิเศษ (คิดจากยอดสินค้าหลังจากเช็กเงื่อนไขส่งฟรีแล้ว):
    if($isMember === true){
        if($productPrice <= 2999) {
            $discount = $productPrice * 5 / 100; 
        }else if($productPrice >= 3000)
            $discount = $productPrice * 10 / 100; 
    }

    //ราคารวมสุทธิที่ต้องชำระ
    $netPrice = ($productPrice + $shippingFee) - $discount

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- ราคาสินค้าต้นทุน, ค่าจัดส่งที่คำนวณได้, ส่วนลดที่ได้รับ, ราคารวมสุทธิที่ต้องชำระ -->
    <?php 
     echo "<h1>ราคาสิน: $productPrice</h1>"; 
     echo "<h1>ค่าจัดส่ง: $shippingFee</h1>" ;
     echo "<h1>ส่วนลดที่ได้รับ: $discount</h1>" ;
     echo "<h1>ราคารวมสุทธิที่ต้องชำระ: $netPrice</h1>" ;
    ?>
</form>
</body>
</html>