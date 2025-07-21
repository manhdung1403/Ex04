<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
  // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
  session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NenTang.vn</title>

  <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ trang web -->
  <?php include_once(__DIR__ . '/../layouts/styles.php'); ?>
</head>

<body class="d-flex flex-column h-100">
  <!-- header -->
  <?php include_once(__DIR__ . '/../layouts/partials/header.php'); ?>
  <!-- end header -->

  <div class="container-fluid">
    <div class="row">
      <!-- sidebar -->
      <?php include_once(__DIR__ . '/../layouts/partials/sidebar.php'); ?>
      <!-- end sidebar -->

      <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">DASHBOARD</h1>
        </div>
        <div
        <!-- Block content -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-primary mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="baocaoSanPham_SoLuong">
                    <h1>0</h1>
                  </div>
                  <div>Tổng số mặt hàng</div>
                </div>
              </div>
              <button class="btn btn-primary btn-sm form-control" id="refreshBaoCaoSanPham">Refresh dữ liệu</button>
            </div> <!-- Tổng số mặt hàng -->
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-success mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="baocaoKhachHang_SoLuong">
                    <h1>0</h1>
                  </div>
                  <div>Tổng số khách hàng</div>
                </div>
              </div>
              <button class="btn btn-success btn-sm form-control" id="refreshBaoCaoKhachHang">Refresh dữ liệu</button>
            </div> <!-- Tổng số khách hàng -->
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-warning mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="baocaoDonHang_SoLuong">
                    <h1>0</h1>
                  </div>
                  <div>Tổng số đơn hàng</div>
                </div>
              </div>
              <button class="btn btn-warning btn-sm form-control" id="refreshBaoCaoDonHang">Refresh dữ liệu</button>
</div> <!-- Tổng số đơn hàng -->
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-danger mb-2">
                <div class="card-body pb-0">
                  <div class="text-value" id="baocaoGopY_SoLuong">
                    <h1>0</h1>
                  </div>
                  <div>Tổng số góp ý</div>
                </div>
              </div>
              <button class="btn btn-danger btn-sm form-control" id="refreshBaoCaoGopY">Refresh dữ liệu</button>
            </div> <!-- Tổng số góp ý -->
            <div id="ketqua"></div>
          </div><!-- row -->
          <div class="row">
            <!-- Biểu đồ thống kê loại sản phẩm -->
            <div class="col-sm-6 col-lg-6">
              <canvas id="chartOfobjChartThongKeLoaiSanPham"></canvas>
              <button class="btn btn-outline-primary btn-sm form-control" id="refreshThongKeLoaiSanPham">Refresh dữ liệu</button>
            </div><!-- col -->

          </div><!-- row -->
        </div>
        <!-- End block content -->
      </main>
    </div>
  </div>

  <!-- footer -->
  <?php include_once(__DIR__ . '/../layouts/partials/footer.php'); ?>
  <!-- end footer -->

  <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
  <?php include_once(__DIR__ . '/../layouts/scripts.php'); ?>

  <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
  <!-- Liên kết thư viện ChartJS -->
  <!-- <script src="/php/myhand/assets/vendor/Chart.js/Chart.min.js"></script> -->
  <script>
    $(document).ready(function() {
    });
  </script>
</body>

</html>