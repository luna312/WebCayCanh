<?php
if (isset($_GET['thamso'])) {
    $tham_so = $_GET['thamso'];
} else {
    $tham_so = "";
}
switch ($tham_so) {
    case "xuat_san_pham":
        include("ChiTietSanPham.php");
    case "xuat_loai_san_pham":
        include("TheLoaiSanPham.php");
    case "xuat_tim_san_pham":
        include("TimKiem.php");
    case "xuat_chi_tiet_don_hang":
        include("ChiTietDonHang.php");
    case "xuat_blog":
        include("QuanLyBaiViet.php");
        break;
    case "xoa_blog":
        include("QuanLyBaiViet.php");
        break;
    case "xoa_blog_admin":
        include("DanhSachBlog.php");
        break;
    case "xuat_chi_tiet_blog";
        include("ChiTietTinTuc.php");
        break;
    case "xuat_gio_hang";
        include("GioHang.php");
        break;
 
}
