 var myVar=setInterval(function(){M()},1000);
 function M() {
  var date = new Date(Date.UTC(2017, 9, 22, 3, 0, 0));
  var options = {weekday: "long", year: "numeric", month: "long", day: "numeric"};
  options.timeZone = "UTC";
  options.timeZoneName = "short";
  var dt=date.toLocaleString("gr-GR", options);
  var dws=new Date();
  var h = dws.getHours();
  var m = dws.getMinutes();
  var x = h >= 12 ? 'μμ' : 'πμ';
  h = h % 12;
  h = h ? h : 12;
  m = m < 10 ? '0'+m: m;
  var mytime= h + ':' + m + ' ' + x;
  dt+=" "+ mytime;
  document.getElementById("demo").innerHTML=dt;
 }
