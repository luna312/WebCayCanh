<?php include_once("Tren.php");
include("DataProvider.php"); ?>
<div class="rightmain">
    <?php
    $_SESSION['trang_chi_tiet_gio_hang'] = "co";
    $MaSP = $_GET['id'];

    $connection = mysqli_connect("localhost", "root", "", "webcaycanh");
    mysqli_query($connection, 'set character set "utf8"');
    $dsSach = mysqli_query($connection, "select * from sanpham where MaSP='" . $MaSP . "'");
    $row = mysqli_fetch_array($dsSach, MYSQLI_ASSOC);
    $link_anh = "Anh/CayCanh/" . $row['HinhAnh'];
    $link = "?thamso=xuat_san_pham&id=" . $row['MaSP'];
    ?>

    <div class="ndtintuc">
        <table>
            <tr>
                <td rowspan="4" width="150px">
                    <?php
                    echo "<img width='116px' height='168px' src='$link_anh'>";
                    ?>
                </td>

                <td>
                    <br>
                    <p>Tên SP:
                        <strong><?php
                                echo $row['TenSP'];
                                ?></strong>
                    </p>
                    <br />
                </td>
            </tr>
            <tr>
                <td>
                    <br />
                    <p>Đơn giá:
                        <?php
                        echo $row['TienSP'];
                        ?></p>
                    <br />
                </td>
            </tr>
            <tr>
                <td>
                    <br />
                    <p>Số lượng tồn kho:
                        <?php
                        echo $row['SoLuongSP'];
                        ?></p>
                    <br />
                </td>

                
            </tr>
            <tr><td>


<form id='form3' method='get' action='GioHang.php'>
    <input type='hidden' name='thamso' value='xuat_gio_hang'>
    <input type='hidden' name='id' value="<?php echo $_GET['id']; ?>">
    <input type='number' name='so_luong' value='1' min="1" style='width:100px;height:40px'>
    <input class='btnDat' type='submit' value='Thêm vào giỏ' style='margin-left:15px'>
</form>


<!-- <a  class="btnDat" href='Giohang.php<?php echo $link; ?>'  >Đặt Hàng</a>-->
</td></tr>

            <tr>
                <td colspan="2">
                    <br />
                    &nbsp;<strong>Mô tả</strong>
                </td>
            </tr>
            <tr>
                <td class="auto-style2" colspan="2">
                    <?php
                    echo  nl2br($row['Mota']);
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="Danhsachsp">
        <p>Bình Luận</p>
    </div>
    <p class="ndcm">Nội Dung</p>
    <form name="form4" method="post">
        <table>
            <tr>
                <td><textarea class="ndtext" id="tbND" name="tbND" style="width: 465px; height: 100px" value=""></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" ID="btnBL" name="btnBL" Class="btnDat" value="Bình Luận" /></td>

            </tr>
        </table>
    </form>

    <?php


    $dsCm = "sELECT * FROM binhluansp where MaSP='" . $MaSP . "'";
    mysqli_query($connection, "set names 'utf8'");
    $query = mysqli_query($connection, $dsCm);
    while ($data = mysqli_fetch_array($query)) {
        $MaBL = $data["MaBL"];
        $MaTK = $data["MaTK"];
        $MaSP = $data["MaSP"];
        $NgayBL = $data["NgayBL"];
        echo "<tr>";
        for ($i = 1; $i <= 3; $i++) {
            echo "<td>";
            if ($data != false) {
    ?>

                <table class="bangbl" style="width:100%;">

                    <tr class="dongbl">
                        <td width="15%" class="hangbl">
                            <p style="color: #3333CC"><?php
                                                        $dsTK = DataProvider::ExecuteQuery("SELECT * From taikhoan ");
                                                        if ($dsTK != false) {
                                                            if (mysqli_num_rows($dsTK) > 0) {
                                                                while ($row = mysqli_fetch_array($dsTK)) {
                                                                    $TenKH1 = $row["TenTK"];
                                                                    $MaTK1 = $row["MaTK"];

                                                                    if ($MaTK == $MaTK1) {
                                                                        echo ($TenKH1);
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        ?></p>
                        </td>
                        <td width="85%" class="hangbl">
                            <span style="font-size: xx-small">đã bình luận ngày</span>
                            <span style="font-size: xx-small; color: #000000">
                                <?php
                                echo $data['NgayBL'];
                                ?>
                            </span>
                        </td>

                    </tr>
                    <tr class="dongbl">
                        <td height="54" colspan="2" class="hangbl">
                            <span>
                                <?php
                                echo $data['NoiDungBL'];
                                ?></span>
                        </td>
                    </tr>

                </table>
    <?php
            }
            if ($i != 3) {
                $data = mysqli_fetch_array($query);
            }
        }


        echo "</tr>";
    }

    echo "</table>";
    mysqli_close($connection);
    ?>
</div>

</div>
<?php
if (isset($_REQUEST["btnBL"])) {
    $today = date('Y/m/d H:i:s');
    $flag = 0;
    include_once("DataProvider.php");
    $sql = "Insert into binhluansp (MaSP,MaTK,NgayBL,NoiDungBL ) values (";
    $sql .= $MaSP . ",";
    $sql .= $matk . ",";
    $sql .= "'" . $today . "',";
    $sql .= "'" . $_REQUEST["tbND"] . "')";
    DataProvider::ExecuteQuery($sql);
    echo ($sql);
    $maBL = -1;
    $sql = "select max(MaBL) From binhluansp";
    $result = DataProvider::ExecuteQuery($sql);
    if ($result != false) {
        $row = mysqli_fetch_array($result);
        $maBL = $row["max(MaBL)"];
        $flag = 1;
    }
    if ($flag == 1) {
?>
        <script>
            window.location.href = "/WebCayCanh/ChiTietSanPham.php?<?php echo $link; ?>";
        </script>
<?php
    }
}


?>

<style>
    .hangbl {
        margin-top: 20px;
    }

    .bangbl {
        padding: 10px;
        margin-top: 20px;
        border-radius: 5px;
        background-color: #eff1f3;
        border-style: solid;
        border-color: rgba(0, 0, 0, 0.19);
    }

    .ndtext {
        margin-left: 10px;
        margin-top: 10px;
    }

    .ndcm {
        margin-left: 10px;
        margin-top: 10px;
        font-weight: bold;
        font-size: 18px;
    }

    .btnDat {
        outline: none;
        border-color: #28a745;
        border-style: solid;
        padding: 10px;
        height: 40px;
        color: white;
        font-size: 16px;
        border-radius: 5px;
        background-color: #28a745;
        cursor: pointer;
        text-decoration: none;
        list-style: none;

    }
</style>

</div>
</div>
<?php include_once("Duoi.php"); ?>