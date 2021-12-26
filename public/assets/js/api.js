let ktpm = 0;
let mmt = 0;
let httt = 0;
let bangdiem = [];
let cnt = 0;
let monHoc = [
  { maMon: "841020", ktpm: 0.1, httt: 0.08, mtt: 0.05 },
  { maMon: "841040", ktpm: 0.13, httt: 0.05, mtt: 0.05 },
  { maMon: "841021", ktpm: 0.06, httt: 0.15, mtt: 0.08 },
  { maMon: "841022", ktpm: 0.1, httt: 0.06, mtt: 0.1},
  { maMon: "841309", ktpm: 0.07, httt: 0.08, mtt: 0.08 },
  { maMon: "841310", ktpm: 0.11, httt: 0.06, mtt: 0.04 },
  { maMon: "841104", ktpm: 0.03, httt: 0.18, mtt: 0.3 },
  { maMon: "841304", ktpm: 0.07, httt: 0.09, mtt: 0.08 },
  { maMon: "841108", ktpm: 0.13, httt: 0.07, mtt: 0.04 },
  { maMon: "841109", ktpm: 0.08, httt: 0.1, mtt: 0.03 },
  { maMon: "841044", ktpm: 0.12, httt: 0.08, mtt: 0.05 },
];
// $("document").ready(function () {
//     $('#logout').click(function(){
//         localStorage.removeItem("danhSachMaMon");
//         localStorage.removeItem("danhSachDiem");
//     });
//   $.post(`http://localhost/Software-Technology/user/getID`, function (response) {
//     if (response.quyen == "Q01") {
//         if (localStorage.getItem("danhSachMaMon") == null || localStorage.getItem("danhSachDiem") == null ) {
//             let chuathi = [];
//             let url =
//             "https://sah-api-chw3b6ptpq-as.a.run.app/v1/users/" +
//             response.id +
//             "/scores2";

//             let cottong;
//             $.get(url, (data) => {
//                 data_column = Object.keys(data);
//                 tong = data;
//                 console.log(tong);
//                 data_column.forEach((element) => {
//                     cottong = tong[element]["diemTheoMon"];
//                     cottong.forEach((ct) => {
//                     if (ct["diemHe10"]) {
//                         let diem = { maMon: ct["maMonHoc"], diem: ct["diemHe10"] };
//                         bangdiem.push(diem);
//                     } else {
//                         chuathi.push(ct["maMonHoc"]);
//                     }
//                     });
//                 });
//                 tinhToan();
//                 let bangDiem = [{ktpm:ktpm},{httt:httt},{mmt:mmt},{cnt:cnt}]
//                 localStorage.removeItem("danhMaMon");
//                 localStorage.setItem("danhSachMaMon", JSON.stringify(chuathi));
//                 localStorage.removeItem("danhSachDiem");
//                 localStorage.setItem("danhSachDiem", JSON.stringify(bangDiem));
//             }); 
//         } 
//         }
//     });
// });

function tinhToan() {
  let d1 = 0,
    d2 = 0,
    d3 = 0;
  monHoc.forEach((mon) => {
    bangdiem.forEach((diem) => {
      if (diem["maMon"] == mon["maMon"]) {
        ktpm += diem["diem"] * mon["ktpm"];
        httt += diem["diem"] * mon["httt"];
        mmt += diem["diem"] * mon["mtt"];
      }
    });
  });
  ktpm = Math.round((ktpm /1.0) * 1000) / 100;
  mmt = Math.round((mmt / 1.0) * 1000) / 100;
  httt = Math.round((httt / 1.0) * 1000) / 100;
  cnt = ktpm + mmt + httt;
}
