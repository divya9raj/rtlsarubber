<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_nbGroup(event, grpName) { //v6.0
  var i,img,nbArr,args=MM_nbGroup.arguments;
  if (event == "init" && args.length > 2) {
    if ((img = MM_findObj(args[2])) != null && !img.MM_init) {
      img.MM_init = true; img.MM_up = args[3]; img.MM_dn = img.src;
      if ((nbArr = document[grpName]) == null) nbArr = document[grpName] = new Array();
      nbArr[nbArr.length] = img;
      for (i=4; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
        if (!img.MM_up) img.MM_up = img.src;
        img.src = img.MM_dn = args[i+1];
        nbArr[nbArr.length] = img;
    } }
  } else if (event == "over") {
    document.MM_nbOver = nbArr = new Array();
    for (i=1; i < args.length-1; i+=3) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = (img.MM_dn && args[i+2]) ? args[i+2] : ((args[i+1])? args[i+1] : img.MM_up);
      nbArr[nbArr.length] = img;
    }
  } else if (event == "out" ) {
    for (i=0; i < document.MM_nbOver.length; i++) {
      img = document.MM_nbOver[i]; img.src = (img.MM_dn) ? img.MM_dn : img.MM_up; }
  } else if (event == "down") {
    nbArr = document[grpName];
    if (nbArr)
      for (i=0; i < nbArr.length; i++) { img=nbArr[i]; img.src = img.MM_up; img.MM_dn = 0; }
    document[grpName] = nbArr = new Array();
    for (i=2; i < args.length-1; i+=2) if ((img = MM_findObj(args[i])) != null) {
      if (!img.MM_up) img.MM_up = img.src;
      img.src = img.MM_dn = (args[i+1])? args[i+1] : img.MM_up;
      nbArr[nbArr.length] = img;
  } }
}
//-->
</script>
</head>

<body onload="MM_preloadImages('IMAGES/what().jpg','IMAGES/what(o).jpg','IMAGES/support().jpg','IMAGES/support(o).jpg','IMAGES/contact().jpg','IMAGES/contac1t(o).jpg')">
<table width="1081" border="0" align="center" bordercolor="#CCCCCC" bgcolor="#E4E4E4">
  <tr bgcolor="#FFFFFF">
    <td height="43" colspan="2" bgcolor="#EBEBEB"><img src="IMAGES/banner.jpg" width="1081" height="100" /></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="38" colspan="2" bgcolor="#999999" class="top1"><div align="left">
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><table border="0" cellpadding="0" cellspacing="0">
            <tr> </tr>
          </table></td>
        </tr>
        <tr> </tr>
      </table>
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><a href="site_home.php" target="_top" onclick="MM_nbGroup('down','group1','home','IMAGES/home().jpg',0)" onmouseover="MM_nbGroup('over','home','IMAGES/home(o).jpg','',0)" onmouseout="MM_nbGroup('out')"><img src="IMAGES/home.jpg" alt="" name="home" border="0" id="home" onload="" /></a></td>
          <td><a href="javascript:;" target="_top" onclick="MM_nbGroup('down','group1','aboutus','IMAGES/aboutus().jpg',0)" onmouseover="MM_nbGroup('over','aboutus','IMAGES/aboutus(o).jpg','',0)" onmouseout="MM_nbGroup('out')"><img src="IMAGES/aboutus.jpg" alt="" name="aboutus" border="0" id="aboutus" onload="" /></a></td>
          <td><a href="javascript:;" target="_top" onclick="MM_nbGroup('down','group1','what','IMAGES/what().jpg',1)" onmouseover="MM_nbGroup('over','what','IMAGES/what(o).jpg','',1)" onmouseout="MM_nbGroup('out')"><img src="IMAGES/what.jpg" alt="" name="what" border="0" id="what" onload="" /></a></td>
          <td><a href="javascript:;" target="_top" onclick="MM_nbGroup('down','group1','support','IMAGES/support().jpg',1)" onmouseover="MM_nbGroup('over','support','IMAGES/support(o).jpg','',1)" onmouseout="MM_nbGroup('out')"><img src="IMAGES/support.jpg" alt="" name="support" border="0" id="support" onload="" /></a></td>
          <td><a href="javascript:;" target="_top" onclick="MM_nbGroup('down','group1','contactus','IMAGES/contact().jpg',1)" onmouseover="MM_nbGroup('over','contactus','IMAGES/contac1t(o).jpg','',1)" onmouseout="MM_nbGroup('out')"><img src="IMAGES/contact.jpg" alt="" name="contactus" border="0" id="contactus" onload="" /></a></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
</body>
</html>
