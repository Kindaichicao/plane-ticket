/**
 * File js của baithi/index
 */

/**Các hàm độc lập không phụ thuộc ajax
 * 
 */

//Hàm set giá trị cho comboBox:
function setSelectTag(tag, val, html) {
  tag.append('<option value="' + val + '">' + html + '</option>')
}

/**Các xử lí bất đồng bộ
* 
*/

//Lấy toàn bộ danh sách bài thi:
var ajaxBaiThi = $.ajax({
  type: 'GET',
  url: 'http://localhost/Software-Technology/baithi/getAdvanBaiThi',
}).done(function(data) {
  for (var i = 1; i <= data['SoLuong']; i++) {
      if (i % 2) $('#row').append('<tr class="table-light"><td>' + data[i]['MaSV'] + '</td><td>' + data[i]['FullName'] + '</td><td>' + data[i]['MaDe'] + '</td><td>' + data[i]['MaMon'] + '</td><td>' + data[i]['MaKyThi'] + '</td><td>' + data[i]['Diem'] + '</td></tr>');
      else $('#row').append('<tr class="table-info"><td>' + data[i]['MaSV'] + '</td><td>' + data[i]['FullName'] + '</td><td>' + data[i]['MaDe'] + '</td><td>' + data[i]['MaMon'] + '</td><td>' + data[i]['MaKyThi'] + '</td><td>' + data[i]['Diem'] + '</td></tr>');
  }
});

//Lấy danh sách kỳ thi
var ajaxKyThi = $.ajax({
  type: 'GET',
  url: "http://localhost/Software-Technology/kythi/getAllKyThi"
}).done(function(data) {
  for (var i = 0; i < data['SoLuong']; i++) {
      setSelectTag($("#select-exam"), data[i]['MaKyThi'], data[i]['TenKyThi']);
  };
});

//Lấy danh sách môn thi
var ajaxMon = $.ajax({
  type: 'GET',
  url: "http://localhost/Software-Technology/monhoc/getAllMH"
}).done(function(data) {
  for (var i = 0; i < data['SoLuong']; i++) {
      setSelectTag($("#select-mon"), data['data'][i]['MaMon'], data['data'][i]['TenMon']);
  };
});

/**Các phần hide mặc định
* 
*/
$('#boxnoidung').hide();
$('#boxsinhvien').hide();
$('#boxmon').hide();
$('.table-exam').hide();
$('#table-thongke').hide();
$('.chart').hide();
$('.btn-view').hide();


//Hàm xử lí thống kê kết quả kỳ thi:
function calResult() {
  var ajaxThongKe = ajaxKyThi.then(function(dt) {
      return $.ajax({
          type: 'GET',
          url: 'http://localhost/Software-Technology/baithi/thongkeKetQua',
          data: {
              makythi: $("#select-exam").find(":selected").val(),
          }
      })
  }).done(function(data) {
      var html = "";
      for (var i = 1; i <= data['SoLuong']; i++) {
          if (i % 2) html += '<tr class="table-light"><td>' + data[i]['MaSV'] + '</td><td>' + data[i]['FullName'] + '</td><td>' + data[i]['Diem'] + '</td><td>' + data[i]['XepLoai'] + '</td></tr>';
          else html += '<tr class="table-info"><td>' + data[i]['MaSV'] + '</td><td>' + data[i]['FullName'] + '</td><td>' + data[i]['Diem'] + '</td><td>' + data[i]['XepLoai'] + '</td></tr>';
      }
      $('#row-thongke').html(html);

      //Biểu đồ tròn tỉ lệ xếp loại theo kỳ thi:
      function drawChart(select) {
          var numRank = {};
          var textRank = new Array('Giỏi', 'Khá', 'Trung bình', 'Yếu', 'Kém');
          var perRank = {};
          for (var i = 0; i < textRank.length; i++) {
              numRank[textRank[i]] = 0;
          }
          for (var i = 1; i <= data['SoLuong']; i++) {
              numRank[data[i]['XepLoai']]++;
          }
          for (var i = 0; i < textRank.length; i++) {
              perRank[textRank[i]] = parseFloat(numRank[textRank[i]]) / parseFloat(data['SoLuong']);
              perRank[textRank[i]] = Math.round(perRank[textRank[i]] * 100) / 100;
          }
          select.highcharts({
              chart: {
                  type: 'pie',
                  options3d: {
                      enabled: true,
                      alpha: 45,
                      beta: 00,
                  },
                  backgroundColor: "#FFFFFF",
                  borderRadius: 10,
                  borderWidth: 0,
              },
              plotOptions: {
                  pie: {
                      size: 400
                  }
              },
              title: {
                  text: ("Biểu đồ thống kê kết quả " + $("#select-exam").find(":selected").html()).toUpperCase(),
                  style: {
                      color: "#FF0000",
                      fontSize: "14px",
                      fontFamily: "sans-serif",
                      fontWeight: "bold",

                  },
              },
              accessibility: {
                  point: {
                      valueSuffix: '%'
                  }
              },
              tooltip: {
                  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
              },

              credits: {
                  enabled: false
              },
              plotOptions: {
                  pie: {
                      allowPointSelect: true,
                      cursor: 'pointer',
                      depth: 35,
                      dataLabels: {
                          enabled: true,
                          format: '{point.name}: {point.percentage:.1f}% '
                      }
                  }
              },
              series: [{
                  type: 'pie',
                  name: 'Tỉ lệ',
                  data: [
                      ['Giỏi', perRank['Giỏi']],
                      ['Khá', perRank['Khá']],
                      {
                          name: 'Trung bình',
                          y: perRank['Trung bình'],
                          sliced: true,
                          selected: true
                      },
                      ['Yếu', perRank['Yếu']],
                      ['Kém', perRank['Kém']]
                  ]
              }]
          });
      }
      //Bắt sự kiện click xem biểu đồ: 
      $('#view-chart').click(function() {
          $('.table-uni').hide(600);
          $('.chart').show(400);
          drawChart($('#chart-pie'));
      })

      //Vẽ biểu đồ vào cart-chart;
      drawChart($('#chart-pie'));
  })
};

/**BIỂU ĐỒ THỐNG KÊ KẾT QUẢ CÁC KỲ THI
* Container chứa: #card-chart-line
*/
$.ajax({
  type: 'GET',
  url: 'http://localhost/Software-Technology/baithi/thongkeKyThi',
}).done(function(data) {
  function drawLineChart(e) {
      var arrStr = new Array();
      for (var i = 0; i < data['SoLuong']; i++) {
          arrStr.push(data[i]['TenKyThi'])
      }

      var dataGioi = new Array();
      for (var i = 0; i < data['SoLuong']; i++) {
          dataGioi.push(data[i]['Giỏi']);
      }
      var dataKha = new Array();
      for (var i = 0; i < data['SoLuong']; i++) {
          dataKha.push(data[i]['Khá']);
      }
      var dataTrungBinh = new Array();
      for (var i = 0; i < data['SoLuong']; i++) {
          dataTrungBinh.push(data[i]['Trung bình']);
      }
      var dataYeu = new Array();
      for (var i = 0; i < data['SoLuong']; i++) {
          dataYeu.push(data[i]['Yếu']);
      }
      var dataKem = new Array();
      for (var i = 0; i < data['SoLuong']; i++) {
          dataKem.push(data[i]['Kém']);
      }

      e.highcharts({
          chart: {
              type: 'line',
              backgroundColor: "#FFFFFF",
              borderRadius: 10,
              borderWidth: 0,
          },
          title: {
              text: 'BIỂU ĐỒ TƯƠNG QUAN XẾP LOẠI QUA CÁC KỲ THI',
              style: {
                  color: "#FF0000",
                  fontSize: "18px",
                  fontFamily: "sans-serif",
                  fontWeight: "bold",
              }
          },
          xAxis: {
              categories: arrStr,
          },
          yAxis: {
              title: {
                  text: 'Số lượng',
                  fontSize: "14px",
                  fontFamily: "sans-serif",
                  fontWeight: "bold",
              }
          },
          plotOptions: {
              line: {
                  dataLabels: {
                      enabled: true
                  },
                  enableMouseTracking: false
              }
          },
          series: [{
                  name: 'Giỏi',
                  data: dataGioi,
              }, {
                  name: 'Khá',
                  data: dataKha,
              }, {
                  name: 'Trung bình',
                  data: dataTrungBinh,
              },
              {
                  name: 'Yếu',
                  data: dataYeu,
              },
              {
                  name: 'Kém',
                  data: dataKem,
              }
          ]
      });
  }
  //Bắt sự kiện click xem biểu đồ: 
  $('#view-chart').click(function() {
      $('#chart-line').show();
      drawLineChart($('#chart-line'));
  })
  drawLineChart($('#chart-line'));
})

/**
* THỐNG KÊ THEO MÔN THI: 
*/
function calSubject() {
  $.ajax({
      type: 'GET',
      url: 'http://localhost/Software-Technology/baithi/getBaiThiByMaMon',
      data: {
          mamon: $("#select-mon").find(":selected").val(),
          makythi: $("#select-exam").find(":selected").val(),
      }
  }).done(function(data) {
      $('#row-mon').html("");
      for (var i = 0; i < data['SoLuong']; i++) {
          if (i % 2) $('#row-mon').append('<tr class="table-info"><td>' + data[i]['MaSV'] + '</td><td>' + data[i]['FullName'] + '</td><td>' + data[i]['MaDe'] + '</td><td>' + data[i]['Diem'] + '</td><td>' + data[i]['XepLoai'] + '</td></tr>');
          else $('#row-mon').append('<tr class="table-light"><td>' + data[i]['MaSV'] + '</td><td>' + data[i]['FullName'] + '</td><td>' + data[i]['MaDe'] + '</td><td>' + data[i]['Diem'] + '</td><td>' + data[i]['XepLoai'] + '</td></tr>');
      }
  })
}

$(document).ready(function() {

  calResult();

  //Bắt sự kiện khi thay đổi kỳ thi:
  $('#select-exam').change(function() {
      calResult();
      calSubject();
  });

  //Bắt sự kiện khi thay đổi môn thi
  $('#select-mon').change(function() {
      calSubject();
  })

  $('button').click(function() {
      $('#boxmon').hide();
      $('#boxnoidung').hide();
      $('#boxsinhvien').hide();
  });

  //Bắt sự kiện khi click xem bài thi
  $('#view-exam').click(function() {
      $("#card-task").show();
      $("#table-baithi").show(100);
      $("#table-thongke").hide();
      $('#boxnoidung').hide(400);
      $('.btn-view').hide();
      $('.chart').hide();
  });

  //Bắt sự kiện khi click xem thống kê
  $('#view-cal').click(function() {
      $("#card-task").show();
      $("#table-thongke").show();
      $("#table-baithi").hide();
      $('#boxnoidung').show(400);
      $('#title-thongke').show();
      $('#title-mon').hide();
      $('.btn-view').show();
      $('.chart').hide();
  });

  //Bắt sự kiện khi click xem biểu đồ
  $("#view-chart").click(function() {
      $("#card-task").hide();
  })

  //Bắt sự kiện khi click xem môn học:
  $('#view-mon').click(function() {
      $('.table-exam').hide();
      $('#title-mon').show();
      $('#boxmon').show(400);
      $('#boxnoidung').show(400);
      calSubject();
  })

   //Xuất file excel:
   $("#btn-export").click(function() {
   
      var current_time = new Date();
      $(".table:visible").table2excel({
          name: "Worksheet Name",
          filename: "export-" + current_time.getDate() + "-" + (current_time.getMonth() + 1),
          fileext: ".xlsx"
      });
  
  });

});