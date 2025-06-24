<?php include 'header.php'; ?>

<link rel="stylesheet" href="content/js/event/fair.css">
<link rel="stylesheet" href="content/js/event/genusys.css">
<link rel="stylesheet" href="content/js/event/menu.css">
<script type="text/javascript" src="content/js/event/jquery-latest.js"></script>
<script type="text/javascript" src="content/js/event/basiccalendar.js"></script>
<script type="text/javascript" src="content/js/event/jquery.colorbox-min.js"></script>
<link rel="stylesheet" type="text/css" href="content/js/event/colorbox.css" media="screen" />

<script type="text/javascript">
    $(function(){jQuery('.gsl').colorbox({rel:true,current:""});});
</script>

<style type="text/css">
    .bdr { border:1px solid #000000; }
    #mini_info {  margin-top: 59px;  }
</style>


<!-- #navigation -->
<div id="page-title">
    <div class="container clearfix">
        <h1>Event Gallery<span> </span></h1>
    </div>
</div>

<!--<div class="content-wrap">-->
    <div id="sub_page">
        <div id="mini_ban" class="event_ban">
            <div class="ban_info">
                <span class="ban_txt"></span>
            </div>
        </div>

        <div id="mini_info">
            <script type="text/javascript">
                var todaydate=new Date()
                var curmonth=todaydate.getMonth()+1 //get current month (1-12)
                var curyear=todaydate.getFullYear() //get current year

                document.write(buildCal(curmonth ,curyear, "main", "month", "daysofweek", "days", 0));
            </script>
        </div>





<div id="sub_page_txt">
<div class="head_txt">CommunicAsia, Singapore 2008</div>
<table width="100%" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #999999;">
            <tr>
              <td valign="top">
              <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <tr>
                  <td align="center"><a class="gsl" title="CommunicAsia 2008" href="content/images/all/gallery/ca2008/images/1.jpg" ><img src="content/images/all/gallery/ca2008/thumbnails/1.jpg" width="140" height="93" border="0" class="bdr" /></a></td>
                  <td align="center"><a class="gsl" title="CommunicAsia 2008" href="content/images/all/gallery/ca2008/images/2.jpg" ><img src="content/images/all/gallery/ca2008/thumbnails/2.jpg" width="140" height="93" border="0" class="bdr" /></a></td>
                  <td align="center"><a class="gsl" title="CommunicAsia 2008" href="content/images/all/gallery/ca2008/images/3.jpg" ><img src="content/images/all/gallery/ca2008/thumbnails/3.jpg" width="140" height="93" border="0" class="bdr" /></a></td>
                  <td align="center"><a class="gsl" title="CommunicAsia 2008" href="content/images/all/gallery/ca2008/images/4.jpg" ><img src="content/images/all/gallery/ca2008/thumbnails/4.jpg" width="140" height="93" border="0" class="bdr" /></a></td>
                </tr>
                <tr>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                </tr>
                
                <tr>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="center"><a href="event_gallery.php?year=2008"><img src="content/images/all/img/back.gif" width="108" height="21" border="0" /></a></td>
                </tr>
              </table></td>
            </tr>
        </table>

</div>
    


</div>

<div class="clear"></div>
<div class="promo clearfix" style="margin-top: 10px;">
    <div class="promo-desc">
        <h3><span>Personal Approach to the Client</span> </h3>
        <span>We work personally with every client because every client is our family member.</span>
    </div>
</div>
<?php include 'footer.php'; ?>

