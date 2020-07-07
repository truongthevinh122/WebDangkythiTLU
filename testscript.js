$.getJSON("http://localhost:8235/api.dangkythi/api/tb_monhoc/read.php",function(data){
  var monhoc = data.data;
  console.log(monhoc);
  if(monhoc.length > 0){
    var temp = "";
    monhoc.forEach((u) => {
      temp += "<tr class='odd gradeX'>";
      temp += "<td>"+u.monhoc_ma+"</td>";
      temp += "<td>"+u.monhoc_ten+"</td>";
      temp += "<td class='center'>"+u.bomon_ma+"</td>";
      temp += "<td class='center'>"+u.monhoc_tinchi+"</td></tr>";
    })
    document.getElementById("tb_monhoc").innerHTML = temp;

  }

});
