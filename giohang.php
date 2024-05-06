<!DOCTYPE html>
<html>

<head>
    <title>SHOPPING CART EXAMPLE</title>
    <meta charset='utf-8'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="csscontact.css">
    <link rel="stylesheet" href="csstrangchu.css">
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .wrapper {
            width: 1140px;
            margin: 0 auto;
        }


        .transparent-btn {
            background-color: rgba(114, 54, 54, 0.3);
            border: none;
            outline: none;
            color: black;
            transition: background-color 0.4s ease;
        }

        .transparent-btn:hover {
            color: black;
            /* Màu chữ khi hover */
        }


        .transparent-btn a {
            color: black;
            text-decoration: none;
        }

        .contact {
            position: fixed;
            right: 20px;
            bottom: 20px;

        }

        .contact img {
            margin-bottom: 10px;
            display: block;
            margin: 0 auto;
            /* Thêm dòng này để căn giữa ảnh */
        }

        .mucde {
            border-radius: 30px;
            text-shadow: 4px 4px 5px cyan;
            width: 210px;
            margin: 5px 5px 50px;
            margin-top: 100px;
            padding: 5px;
            transition: .4s;
        }

        .mucde a {
            color: rgb(113, 85, 85);
            /* or any other color you prefer */
        }

        .mucde:hover {
            transform: scale(1.4);
            /* Phóng to khung giỏ hàng khi di chuột vào */
        }

        .mucde a:hover {
            text-decoration: none;
        }

        /* Thêm lớp mới để giảm độ rộng của cột số lượng */
        .soluong {
            width: 120px;
            /* Độ rộng của cột số lượng */
        }

        .dongia {
            width: 150px;
        }

        .thaotac {
            width: 100px;
            /* Độ rộng của cột thao tác */
        }

        .masua {
            width: 150px;
        }

        th {
            text-align: center;
            font-size: 20px;
        }

        thead {
            background-color: rgba(255, 255, 5, 0.475);
        }

        tbody {
            font-size: 20px;
            background-color: rgba(239, 239, 221, 0.468);
        }

        table {
            border: 4px solid black;
            border-radius: 13px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            /* Tạo bóng với độ mờ 10px và màu đen */
        }

        /* Nếu muốn viền của các ô trong bảng cũng có góc tròn */
        td,
        th {
            text-align: center;
        }

        table {
            border-collapse: separate;
            /* Đảm bảo sự phân tách giữa các ô */
            border-spacing: 0;
            /* Đặt khoảng cách giữa các ô thành 0 */
        }

        td,
        th {
            border-radius: 0px;
            /* Đặt bán kính border-radius cho các góc của ô */
        }

        thead th:first-child {
            border-top-left-radius: 13px;
            /* Đặt bán kính border-radius cho góc trên bên trái của ô đầu tiên trong thead */
        }

        thead th:last-child {
            border-top-right-radius: 13px;
            /* Đặt bán kính border-radius cho góc trên bên phải của ô cuối cùng trong thead */
        }

        tbody tr:last-child td:first-child {
            border-bottom-left-radius: 13px;
            /* Đặt bán kính border-radius cho góc dưới bên trái của ô đầu tiên trong tbody */
        }

        tbody tr:last-child td:last-child {
            border-bottom-right-radius: 13px;
        }

        nav {
            background-color: rgb(247, 237, 237);
            color: #fff;
            padding: 5px;
            text-align: center;
            position: fixed;
            /* Menu cố định */
            width: 100%;
            top: 0;
            z-index: 999;
            /* Đảm bảo menu hiển thị trên các phần khác */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;

        }

        nav ul li {
            width: 100px;
            height: 50px;
            line-height: 50px;
            margin: 10px 20px 0px 10px;
        }

        .icon {
            width: 190px;
            height: 50px;
            line-height: 50px;

        }

        nav ul li:last-child {
            margin-right: 0;
        }

        nav ul li a {
            text-decoration: none;
            color: #c75858;
            font-weight: bold;
            font-size: 1.2em;
            transition: 1s ease;
            border-radius: 5px;
        }

        nav ul li a:hover {
            text-decoration: none;
            color: #c75858;
        }

        nav ul li:hover {
            background-color: hsl(0, 30%, 82%);
            border-radius: 5px;
        }

        .search-icon img,
        .user-icon img,
        .cart-icon img {
            width: 25px;
            height: auto;
            margin-right: 10px;
            cursor: pointer;
        }

        .search-box {
            position: absolute;
            top: 50%;
            /* Điều chỉnh vị trí theo chiều dọc */
            left: 72%;
            /* Đặt ở bên phải của biểu tượng tìm kiếm */
            transform: translateY(-50%);
            /* Canh chỉnh để ô tìm kiếm nằm chính giữa theo chiều dọc */
            display: none;
        }

        .search-box.active {
            display: block;
        }

        .search-box input[type="text"] {
            padding: 5px;
            margin-right: 5px;
            border: 1px solid #2a1f1f9a;
            border-radius: 5px;
        }

        .payment-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            /* Thêm khoảng cách phía trên bảng */
        }

        .payment-details th,
        .payment-details td {
            border: 1px solid #ccc;
            padding: 12px;
            /* Tăng độ rộng của ô */
            text-align: left;
        }

        .payment-details th {
            background-color: #f2f2f2;
        }

        #payment-popup {
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 999;
        }

        #payment-popup h2 {
            margin-top: 0;
            font-size: 20px;
        }

        .payment-details {
            margin-bottom: 20px;
        }

        .payment-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .payment-details th,
        .payment-details td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        .payment-details th {
            background-color: #f2f2f2;
        }

        .payment-total p {
            margin: 5px 0;
        }

        .payment-total p span {
            font-weight: bold;
        }

        .payment-options h3 {
            margin-top: 0;
            font-size: 16px;
        }

        .payment-options label {
            display: block;
            margin-bottom: 10px;
        }

        .payment-options input[type="radio"] {
            margin-right: 5px;
        }

        .xn,
        .h {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .xn {
            background-color: #4CAF50;
            color: white;
        }

        .h {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <a href="https://live2.vebo16.net/"><img src="logo-he-xoilac.gif" alt width="150px"></a>
        </div>
        <div class="navigation">
            <ul>
                <li><a href="Trangchu.html">Trang chủ</a></li>
                <li><a href="ADthongtin.php">Sản phẩm</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="thongtinlienhe.html">Liên hệ</a></li>
            </ul>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Nhập từ khóa">
        </div>
        <div class="icon">
            <ul>
                <li class="search-icon"><img src="search.png" alt="Search"></li>
                <li class="cart-icon"><a href="giohang.php"><img src="giohang.png" alt="Cart"></a></li>
                <li class="user-icon"><a href="dangnhap.html"><img src="user.png" alt="User"> </a></li>
            </ul>
        </div>
    </nav>
    <div class="wrapper">
        <div class="mucde">
            <h1><a href="giohang.php">GIỎ HÀNG</a></h1>
        </div>
        <br />
        <div class="row">
            <table class="table table-bordered" id="table-products">
                <thead>
                    <tr>
                        <th class="masua">Mã Sản Phẩm</th>
                        <th>Tên Sữa</th>
                        <th class="dongia">Đơn Giá</th>
                        <th class="soluong">Số lượng</th>
                        <th>Thành tiền</th>
                        <th class="thaotac">Chọn</th>
                    </tr>
                </thead>
                <tbody>
                <?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Truy vấn cơ sở dữ liệu để lấy dữ liệu từ bảng sản phẩm
$sql = "SELECT tensanpham, gia, so_luong FROM san_pham";
$result = $conn->query($sql);

// Hiển thị dữ liệu trong bảng HTML
if ($result->num_rows > 0) {
    // Duyệt qua từng hàng của kết quả truy vấn
    while ($row = $result->fetch_assoc()) {
        $tenSanPham = $row["tensanpham"];
        $donGia = $row["gia"];
        $soLuong = $row["so_luong"];
        $thanhTien = $donGia * $soLuong;

        // Sử dụng thông tin ở đây, ví dụ:
        echo "Tên sản phẩm: " . $tenSanPham . "<br>";
        echo "Đơn giá: " . $donGia . "<br>";
        echo "Thành tiền: " . $thanhTien . "<br><br>";
    }
} else {
    echo "Không có sản phẩm nào.";
}
$conn->close();
?>

                </tbody>
            </table>
        </div>
        <div>
            <button class="transparent-btn btn btn-lg btn-primary" onclick="goBack()">Quay lại</button>
            <button class="transparent-btn btn btn-lg btn-success" id="button-purchase-selected"><a>Mua đã
                    chọn</a></button>

            <button class="transparent-btn btn btn-lg btn-danger" onclick="confirmDeleteSelected()">Xóa đã chọn</button>
        </div>
        <div class="float-contact">
            <div class="hotline">
                <a href="tel:0354301301">
                    <img alt="hotline" src="icon-hc-phone.png" style="width: 40px; height: 40px;" />
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
    <script>
        var shoppingCartItems = [];

        $(document).ready(function () {
            if (sessionStorage.getItem("shopping-cart-items") != null) {
                shoppingCartItems = JSON.parse(sessionStorage.getItem("shopping-cart-items"));
            }
            displayShoppingCartItems();
        });

      

        function goBack() {
            window.history.back();
        }

        function confirmDeleteSelected() {
    // Kiểm tra xem có ít nhất một sản phẩm được chọn hay không
    var selectedItems = getSelectedItems(); // Hàm này trả về mảng các sản phẩm đã chọn
    if (selectedItems.length === 0) {
        alert("Vui lòng chọn ít nhất một sản phẩm để xóa.");
        return;
    }

    // Hiển thị hộp thoại xác nhận chỉ khi có sản phẩm được chọn
    var confirmation = confirm("Bạn có chắc chắn muốn xóa những sản phẩm đã chọn?");
    if (confirmation) {
        deleteSelectedItems();
    }
}
function getSelectedItems() {
    var selectedItems = [];
    $("input[type=checkbox].item-checkbox:checked").each(function () {
        var index = $(this).closest("tr").index();
        selectedItems.push(index);
    });
    return selectedItems;
}



        function deleteSelectedItems() {
            var selectedItems = [];
            $("input[type=checkbox].item-checkbox:checked").each(function () {
                var index = $(this).closest("tr").index();
                selectedItems.push(index);
            });
            if (selectedItems.length > 0) {
                selectedItems.reverse();
                selectedItems.forEach(function (index) {
                    shoppingCartItems.splice(index, 1);
                });
                sessionStorage.setItem("shopping-cart-items", JSON.stringify(shoppingCartItems));
                displayShoppingCartItems();
                alert("Đã xóa các sản phẩm được chọn khỏi giỏ hàng.");
            } else {
                alert("Vui lòng chọn ít nhất một sản phẩm để xóa.");
            }
        }

    </script>
</body>
</html>