<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bảng thông tin sản phẩm sữa</title>
  <link rel="stylesheet" href="csscontact.css">
  <link rel="stylesheet" href="cssnav.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      background-image: url("nensua.jpg") ;
      background-size: cover;
      background-position: center;
      margin-top: 60px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .container {
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      /* background-color: hwb(0 88% 9% / 0.877); */
      background-size: 100%;
      background-position: center;
    }
    table {
      background-color: rgba(255, 255, 255,0.8); /* Màu trắng với độ trong suốt 0.5 */
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      border: 5px solid #1b1a1a; /* Đường viền cho bảng */
      border-radius: 10px; /* Đường cong viền cho bảng */
      overflow: hidden; /* Loại bỏ viền gợn sóng khi hover */
      box-shadow: 20px 20px 10px rgba(0, 0, 0, 0.1);
}

    h1 {
      background-color: lightyellow;
      color: red;
      text-align: center;
      padding: 10px; /* Thêm khoảng đệm cho tiêu đề */
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      transition: background-color 0.3s; /* Hiệu ứng chuyển đổi màu khi hover */
      text-align: center;
    }
    th {
      text-align: justify;
      background-color: lightblue; /* Màu nền cho các thẻ tiêu đề */
      text-align: center;
    }
    td {
      position: relative;
    }
    td a {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: #333; /* Màu cho các liên kết */
      transition: color 0.3s; /* Hiệu ứng chuyển đổi màu khi hover */
    }
    td:hover {
      background-color: #f4ecece4;
    }
    td a:hover {
      color: red; /* Màu cho liên kết khi hover */
    }
    td img {
      margin-right: 5px; /* Khoảng cách giữa hình ảnh và văn bản */
      max-width: 50px; /* Giới hạn chiều rộng của hình ảnh */
}
    label {
      display: block;
      margin-bottom: 8px;
      color: #333;
    }
    .form {
      width: 400px;
      margin: 40px;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }
    label {
      display: block;
      margin-bottom: 8px;
      color: #333;
    }
    input[type="text"],
    input[type="email"],
    button[type="submit"] {
      width: calc(100% - 24px);
      padding: 8px;
      margin-bottom: 16px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    button[type="submit"] {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    button[type="submit"]:hover {
      background-color: #0056b3;
    }
    
       td img:hover , td button:hover,td input:hover{
        cursor: pointer;
       }
         #addProductBtn{
        
        border: none;
        margin-right: 20px;
        width: 120px;
        height: 40px;
        border-radius: 10px;
       }
       #addProductBtn a{
       text-decoration: none;
       }
       #deleteProductBtn{
         border: none;
        margin-left: 20px;
        width: 120px;
        height: 40px;
        border-radius: 10px;
       }
       #addProductBtn:hover{
        cursor: pointer;
        background-color: rgb(247, 237, 237);
        color: blue;
       }
       #deleteProductBtn:hover{
        cursor: pointer;
        background-color: rgb(247, 237, 237);
        
         color: red;
       }
       .editBtn{
        width: 70px;
        height: 30px;
        border-radius: 5px;
        border: 2px solid rgba(0, 0, 0, 0.2);
        /* border: none; */
       }
        
       #cancelAddProductBtn{
        width: 70px;
        height: 30px;
        border-radius: 5px;
        border: 2px solid rgba(0, 0, 0, 0.2);
       }
       #cancelAddProductBtn:hover{
        cursor: pointer;
       }
       #cancelEditProductBtn{
        cursor: pointer;
       }
       #cancelEditProductBtn{
         width: 70px;
        height: 30px;
        border-radius: 5px;
        border: 2px solid rgba(0, 0, 0, 0.2);
       }

    
  </style>
   <link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
 />

</head>

<body>
  <a href="https://one88.cc/"><img src="Banner.gif" style="width: 100%; height: 150px;" alt=""></a>
 <?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "baitaplon";
    $conn = mysqli_connect($server,$user,$pass,$db) or die("Kết nối thất bại");
    $sql = "select * from ADthongtin";
    $result = mysqli_query($conn, $sql);
    if(isset($_POST['deleteProductBtn'])) {
        $product_ids = $_POST['idsanpham'];
        foreach($product_ids as $product_id) {
            $sql = "DELETE FROM ADthongtin WHERE idsanpham='$product_id'";
            $result = mysqli_query($conn, $sql);
            if(!$result) {
                echo "Xóa sản phẩm thất bại: " . mysqli_error($conn);
            }
        }
        echo "Xóa sản phẩm thành công!";
    }

   
    mysqli_close($conn);
?>

<div class="container">
  <nav>
    <div class="logo">
        <a href="logo"><img src="logo.gif" alt="" width="120px"></a>
    </div>
    <ul class="navigation">
        <li><a href="Trangchu.html">Trang chủ</a></li>
        <li><a href="thongtinsanpham.html">Sản phẩm</a></li>
        <li><a href="#">Giới thiệu</a></li>
        <li><a href="thongtinlienhe.html">Liên hệ</a></li>
    </ul>
    <div class="search-box">
        <input type="text" placeholder="Nhập từ khóa">
    </div>
    <ul class="icon">
        <li class="search-icon"><img src="search.png" alt="Search"> </li>
         <li class="cart-icon"><a href="giohang.php"><img src="giohang.png" alt="Cart"></a></li>
        <li class="user-icon"><a href="dangnhap.html"><img src="user.png" alt="User"> </a></li>
       
    </ul>

</nav>
  <form  action = "xoasanpham.php " method = "post">
    
    <table  class="animate__animated animate__zoomIn" style="color: #131212; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;" >
      <h1   class="animate__animated animate__zoomIn" style="color: #e81313; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; border-radius: 10px;" >Thông tin sản phẩm</h1>
      <tr>
        <th>ID sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Nhà sản xuất</th>
        <th>Loại</th>
        <th>Khối lượng</th>
        <th>Giá</th>
        <th>Đặt hàng</th> <!-- Thêm cột cho nút "Sửa" -->
        <th>Thao tác</th>
        <th>Xóa</th>
      </tr>
      <tr>
        <td>001</td>
        <td><a href="chitietsua similac.html">
          <img src="suasimilac.png" width="50px">
          Similac</a>
        </td>
        <td>Abbott</td>
        <td>Sữa bột</td>
        <td>370 gr</td>
        <td>145.000 VND
       
        </td>
        <td><img style="width: 30px;" src="carticon.png" class="addToCartBtn"> </td>
        <td><button class="editBtn"><a href="suasanpham.php">Sửa</a></button></td> <!-- Thêm nút "Sửa" -->
        <td><input type="checkbox" class="productCheckbox"></td>
      </tr>
      <tr>
      <td>002</td>
      <td><a href="chitietsua similac neo sure.html">
        <img src="suasimilac-neosure.png" width="50px">
        Similac Neo Sure 
      </a>
      </td>
      <td>Abbott</td>
      <td>Sữa bột</td>
      <td>370 gr</td>
      <td>145.000 VND </td>   
      <td><img style="width: 30px;" src="carticon.png" class="addToCartBtn"> </td>
      <td><button class="editBtn"><a href="suasanpham.php">Sửa</a></button></td>
      <td><input type="checkbox" class="productCheckbox"></td>
    </tr>
    <tr>
      <td>003</td>
      <td><a href="chitietsua abbot pedia sure.html">
        <img src="suaabbott-pediasure.png" width="50px">
        Abbott Pedia Sure</a>
      </td>
      <td>Abbott</td>
      <td>Sữa bột</td>
      <td>400 gr</td>
      <td>146.000 VND</td>
      <td> <img style="width: 30px;" src="carticon.png" class="addToCartBtn"> </td>
       
       <td><button class="editBtn"><a href="suasanpham.php">Sửa</a></button></td>
      <td><input type="checkbox" class="productCheckbox"></td>
    </tr>
    <tr>
      <td>004</td>
      <td><a href="chitietsua abbott grow.html">
        <img src="suaabbottgrow.png" width="50px">
        GROW</a>
      </td>
      <td>Abbott</td>
      <td>Sữa bột</td>
      <td>400 gr</td>
      <td>87.000 VND
        <td> <img style="width: 30px;" src="carticon.png" class="addToCartBtn"> </td>
        
        <td><button class="editBtn"><a href="suasanpham.php">Sửa</a></button></td></td>
       <td><input type="checkbox" class="productCheckbox"></td>
    </tr>
    <tr>
      <td>005</td>
      <td><a href="Grow School.html">
        <img src="suaabbottgrowschool.png" width="50px">
        Abbott Grow School</a>
      </td>
      <td>Abbott</td>
      <td>Sữa bột</td>
      <td>900 gr</td>
      <td>225.000 VND
        <td> <img style="width: 30px;" src="carticon.png" class="addToCartBtn"> </td>
      </td> <td><button class="editBtn"><a href="suasanpham.php">Sửa</a></button></td>
    <td><input type="checkbox" class="productCheckbox"></td>
    </tr>
    <?php
      while($row = mysqli_fetch_assoc($result)){

    ?>
    <tr>
      <td>
        <?php 
               echo $row["idsanpham"];
        ?>
      </td>
      <td>
         <?php 
               echo $row["tensanpham"];
        ?>
      </td>
      <td>
         <?php 
               echo $row["nsx"];
        ?>
      </td>
      <td>
        <?php 
               echo $row["loai"];
        ?>
      </td>
      <td>
        <?php 
               echo $row["khoiluong"];
        ?>
      </td>
      <td>
        <?php 
               echo $row["gia"];
        ?>
      </td>
      <td> <img style="width: 30px;" src="carticon.png" class="addToCartBtn"> </td>
      </td> <td><button class="editBtn"><a href="suasanpham.php">Sửa</a></button></td>
    <td><input type="checkbox" name="idsanpham[]" value="<?php echo $row["idsanpham"]; ?>"></td>
    </tr>
    <?php
      }
      ?>   
    </table>
    <div style="padding: 20px;">
    <div style="text-align: center;letter-spacing: 10px;text-decoration: underline;">
      <a href="#"><< </a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#"> >></a>
    </div>
    <div style="text-align: center; margin-top: 20px;">
      <button id="addProductBtn"><a href="themsanpham.php">Thêm Sản phẩm</a></button>
      <button type="submit" id="deleteProductBtn" name="deleteProductBtn">Xóa Sản phẩm</button>
    </div>
    </div>
    </div>
    </form>
    <script>
   
    
        // alert('Đã thêm sản phẩm mới: ' + productName);
</script>
<script>

      // alert('Đã cập nhật thông tin sản phẩm.');
  
</script>
<script>
    // Lắng nghe sự kiện khi click vào nút giỏ hàng
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('addToCartBtn')) {
            const productName = event.target.closest('tr').querySelector('td:first-child a').innerText;
            alert('Đã thêm sản phẩm "' + productName + '" vào giỏ hàng.');
        }
    });
    });
    
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    var shoppingCartItems = []; // Khai báo và khởi tạo biến shoppingCartItems
    
    // Thêm sản phẩm vào giỏ hàng
    $(document).ready(function () {
    $(".addToCartBtn").click(function () {
      var button = $(this);
      var name = button.closest('tr').find('td:nth-child(1) a').text(); // Lấy tên sản phẩm
      var price = button.closest('tr').find('td:nth-child(5)').text(); // Lấy giá sản phẩm
      var item = {
        name: name,
        price: price,
        quantity: 1
      };
      var exists = false;
      if (shoppingCartItems.length > 0) {
        $.each(shoppingCartItems, function (index, value) {
          if (value.name === item.name) {
            value.quantity++;
            exists = true;
            return false;
          }
        });
      }
      if (!exists) {
        shoppingCartItems.push(item);
      }
      sessionStorage.setItem("shopping-cart-items", JSON.stringify(shoppingCartItems));
      alert('Đã thêm sản phẩm vào giỏ hàng: ' + name);
    });
    });
    
    // Hiển thị giỏ hàng
    $(document).ready(function () {
    $(".show-cart").click(function () {
      window.location.href = "giohang.html";
    });
    });
    </script>
    </div>
    <script>
      const searchIcon = document.querySelector('.search-icon');
      const searchBox = document.querySelector('.search-box');
  
      searchIcon.addEventListener('click', function() {
          searchBox.classList.toggle('active');
      });
  
      searchBox.addEventListener('click', function(event) {
          // Stop propagation to prevent closing when clicking inside search box
          event.stopPropagation();
      });
  
      // Close search box when clicking outside of it
      document.addEventListener('click', function(event) {
          if (!searchBox.contains(event.target) && !searchIcon.contains(event.target)) {
              searchBox.classList.remove('active');
          }
      });
  </script>
    <a href="https://8xbet0.com/sportEvents#/" style=" margin-top: 10px; width: 100%; margin: 130px;" ><img src="https://media-static.cdnproz1.online/cakhiastatic/8xbet-1095x100.gif" alt=""></a>
    <div class="float-contact">
      <!-- <div class="face">
          <a href="https://www.facebook.com/thietkewebsite.diy" target="blank">
              <img alt="facebook" src="" style="width: 40px; height: 40px;" />
          </a>
      </div> -->
      <div class="hotline">
          <a href="tel:0354301301"  >
              <img alt="hotline" src="icon-hc-phone.png" title="acc" style="width: 40px; height: 40px;"/>
          
          </a>
      </div>
      <div class="zalo">
          <a href="https://zalo.me/0354301301" target="blank">
              <img alt="zalo" src="icon-zalo.png" style="width: 40px; height: 40px;" />
          </a>
      </div>
      <div class="messenger">
          <a href="https://www.messenger.com/t/hvndin204" target="blank">
              <img alt="messenger" src="messenger.png" style="width: 40px; height: 40px;" />
          </a>
      </div>
  
      
  
    </div> 
  </div>
</div>
</div>

</body>
</html>

