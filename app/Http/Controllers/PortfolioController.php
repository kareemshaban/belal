<?php require_once('../Connections/data.php');


include '../library1/conf.php';
?>
<?php
/*function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}*/

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "testform")) {

    include("edara/lead_edara_det_update_action.php");
}//go

$ld_id = intval($_GET["id"]);
mysql_select_db($database_data, $data);
$query_Recordset1 = "SELECT * FROM tbl_lead_edara where id=" . $ld_id . $sql_u_edara;


$Recordset1 = mysql_query($query_Recordset1, $data) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$type = $row_Recordset1['ld_cat_id'];

$ld_emara_id = $row_Recordset1["ld_emara_id"];
$ld_im1 = $row_Recordset1["ld_im1"];
$ld_im2 = $row_Recordset1["ld_im2"];
$ld_im3 = $row_Recordset1["ld_im3"];
$ld_im4 = $row_Recordset1["ld_im4"];
$ld_im5 = $row_Recordset1["ld_im5"];
$ld_im6 = $row_Recordset1["ld_im6"];
$ld_im7 = $row_Recordset1["ld_im7"];
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />
    <title>Document</title>
    <script type="text/javascript">
        //<![CDATA[
        function getCity(textValue) {
            var requester = false;

            if (window.XMLHttpRequest) {
                requester = new XMLHttpRequest;
            } else if (window.ActiveXObject) {
                requester = new ActiveXObject("Microsoft.XMLHTTP");
            }

            if (requester) {
                requester.onreadystatechange = function () {
                    if (requester.readyState == 0 || requester.readyState == 1) {
                        document.getElementById('content_city').innerHTML = '<span><img src="../load/co.gif"></span>';
                    }
                    if (requester.readyState == 4 || requester.readyState == "complete") {
                        if (requester.status == 200 || requester.status == 304) {
                            document.getElementById('content_city').innerHTML = requester.responseText;
                        } else {
                            document.getElementById('content_city').innerHTML = '<p>$estthmar101</p>';
                        }
                    }
                }
                requester.open("GET", "getCity.php?co_id=" + textValue, true);
                requester.send(null);

                //  getHai(-1);
            }
        }
        //]]>


        function getHai2(textValue, hai) {


            var requester = false;



            if (window.XMLHttpRequest) {

                requester = new XMLHttpRequest;

            } else if (window.ActiveXObject) {

                requester = new ActiveXObject("Microsoft.XMLHTTP");

            }



            if (requester) {

                requester.onreadystatechange = function () {

                    if (requester.readyState == 0 || requester.readyState == 1) {

                        document.getElementById('content_hai').innerHTML = '<span><img src="load/co.gif"></span>';

                    }

                    if (requester.readyState == 4 || requester.readyState == "complete") {

                        if (requester.status == 200 || requester.status == 304) {

                            document.getElementById('content_hai').innerHTML = requester.responseText;

                        } else {

                            document.getElementById('content_hai').innerHTML = '<p>$estthmar101</p>';


                        }

                    }

                }

                requester.open("GET", "getHailead_edara.php?ci_id=" + textValue + "&hai=" + hai, true);

                requester.send(null);



            }

        }


        //<![CDATA[
        function getHai(textValue) {
            var requester = false;

            if (window.XMLHttpRequest) {
                requester = new XMLHttpRequest;
            } else if (window.ActiveXObject) {
                requester = new ActiveXObject("Microsoft.XMLHTTP");
            }

            if (requester) {
                requester.onreadystatechange = function () {
                    if (requester.readyState == 0 || requester.readyState == 1) {
                        document.getElementById('content_hai').innerHTML = '<span><img src="load/co.gif"></span>';
                    }
                    if (requester.readyState == 4 || requester.readyState == "complete") {
                        if (requester.status == 200 || requester.status == 304) {
                            document.getElementById('content_hai').innerHTML = requester.responseText;
                        } else {
                            document.getElementById('content_hai').innerHTML = '<p>$estthmar101</p>';
                        }
                    }
                }
                requester.open("GET", "getHai.php?ci_id=" + textValue, true);
                requester.send(null);

            }
        }
        //]]>



        //<![CDATA[
        function getCity_ListField(textValue) {
            var requester = false;

            if (window.XMLHttpRequest) {
                requester = new XMLHttpRequest;
            } else if (window.ActiveXObject) {
                requester = new ActiveXObject("Microsoft.XMLHTTP");
            }

            if (requester) {
                requester.onreadystatechange = function () {
                    if (requester.readyState == 0 || requester.readyState == 1) {
                        document.getElementById('content_city_lf').innerHTML = '<span><img src="load/co.gif"></span>';
                    }
                    if (requester.readyState == 4 || requester.readyState == "complete") {
                        if (requester.status == 200 || requester.status == 304) {
                            document.getElementById('content_city_lf').innerHTML = requester.responseText;
                        } else {
                            document.getElementById('content_city_lf').innerHTML = '<p>$estthmar101</p>';
                        }
                    }
                }
                requester.open("GET", "getCity_ListField.php?co_id=" + textValue, true);
                requester.send(null);

                getHai(-1);
            }
        }
        //]]>

    </script>
    <script type="text/javascript">


        //<![CDATA[
        function setCity1(textValue, current, hai) {
            var requester = false;

            if (window.XMLHttpRequest) {
                requester = new XMLHttpRequest;
            } else if (window.ActiveXObject) {
                requester = new ActiveXObject("Microsoft.XMLHTTP");
            }

            if (requester) {
                requester.onreadystatechange = function () {
                    if (requester.readyState == 0 || requester.readyState == 1) {
                        document.getElementById('content_city').innerHTML = '<span><img src="../load/co.gif"></span>';
                    }
                    if (requester.readyState == 4 || requester.readyState == "complete") {
                        if (requester.status == 200 || requester.status == 304) {
                            document.getElementById('content_city').innerHTML = requester.responseText;
                        } else {
                            document.getElementById('content_city').innerHTML = '<p>$estthmar101</p>';
                        }
                    }
                }
                requester.open("GET", "setCity.php?co_id=" + textValue + "&ci_id=" + current, true);
                requester.send(null);

                setHai(current, hai);
            }
        }
        //]]>

        //<![CDATA[
        function setHai(city, hai) {
            var requester = false;

            if (window.XMLHttpRequest) {
                requester = new XMLHttpRequest;
            } else if (window.ActiveXObject) {
                requester = new ActiveXObject("Microsoft.XMLHTTP");
            }

            if (requester) {
                requester.onreadystatechange = function () {
                    if (requester.readyState == 0 || requester.readyState == 1) {
                        document.getElementById('content_hai').innerHTML = '<span><img src="load/co.gif"></span>';
                    }
                    if (requester.readyState == 4 || requester.readyState == "complete") {
                        if (requester.status == 200 || requester.status == 304) {
                            document.getElementById('content_hai').innerHTML = requester.responseText;
                        } else {
                            document.getElementById('content_hai').innerHTML = '<p>$estthmar101</p>';
                        }
                    }
                }
                requester.open("GET", "setHai.php?ci_id=" + city + "&ha_id=" + hai, true);
                requester.send(null);

            }
        }
        //]]>


        //<![CDATA[
        function ajaxRequest(textValue) {







            <? require_once('../Connections/data.php');
            $id = secure("str", ID_hash($_GET["id"], "dec"));

            $ld_id = intval($id);
            mysql_select_db($database_data, $data);
            $query_Recordset1 = "SELECT * FROM tbl_lead_edara where id=" . $ld_id . $sql_u_edara;
            $Recordset1 = mysql_query($query_Recordset1, $data) or die(mysql_error());
            $row_Recordset1 = mysql_fetch_assoc($Recordset1);
            $totalRows_Recordset1 = mysql_num_rows($Recordset1);


            $ld_country = $row_Recordset1['ld_country'];
            $ld_city = $row_Recordset1['ld_city'];
            $ld_hai = $row_Recordset1['ld_hai'];
            if ($ld_city == "")
                $ld_city = -1;
            if ($ld_hai == "")
                $ld_hai = -1;
            ?>
            setCity('<? echo $ld_country; ?>',<? echo $ld_city; ?>,<? echo $ld_hai; ?>);
        }
        //]]>



        function validate_form(thisform) {








            return true;





        }




    </script>
    <? include('layouts/inner_pages_head.php') ?>

</head>

<body onload="setCity('SA',252,535);">

<? if ($_GET["list_emara_id"] == "")
    $emara_id = $row_Recordset1['ld_emara_id'];
else
    $emara_id = intval($_GET["list_emara_id"]);


if ($_GET["list_emara_id"] != "") {

    $resultsite = mysql_query("select * from tbl_lead_edara    where     ld_active='yes' and id=" . intval($_GET["list_emara_id"]) . $sql_u_edara);
    if (!$resultsite) {
        die("Query to show fields from table tbl_lead_edara1 failed");
    }
    $rowsite = mysql_fetch_array($resultsite);
    $ld_date = $rowsite["ld_date"];
    $ld_date_h = $rowsite["ld_date_h"];
    $ld_finish_period = $rowsite["ld_finish_period"];
    $ld_country = $rowsite["ld_country"];
    $ld_city = $rowsite["ld_city"];
    $ld_hai = $rowsite["ld_hai"];
    $malk_id = $rowsite["malk_id"];


} else {
    if ($row_Recordset1["ld_emara_id"] != "") {
        $resultsite1 = mysql_query("select * from tbl_lead_edara  where     ld_active='yes' and  id=" . $row_Recordset1["ld_emara_id"] . $sql_u_edara);
        if (!$resultsite1) {
            die("Query to show fields from table tbl_lead_edara 2 failed");
        }
        $rowsite1 = mysql_fetch_array($resultsite1);

        $ld_date = $rowsite1["ld_date"];
        $ld_date_h = $rowsite1["ld_date_h"];
        $ld_finish_period = $rowsite1["ld_finish_period"];
        $ld_country = $rowsite1["ld_country"];
        $ld_city = $rowsite1["ld_city"];
        $ld_hai = $rowsite1["ld_hai"];
        $malk_id = $rowsite["malk_id"];
    }

}

if ($row_Recordset1["ld_emara_id"] == "")
    $ld_finish_period = $row_Recordset1['ld_finish_period'];

if ($ld_date == "")
    $ld_date = $row_Recordset1['ld_date'];
if ($ld_date_h == "")
    $ld_date_h = $row_Recordset1['ld_date_h'];
?>

<SCRIPT src="ajax_valid2/vanadium-min_no_text.js" type=text/javascript></SCRIPT>

<script>
    $(document).ready(function () {

        $('.popup-youtube').magnificPopup({

            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,

            fixedContentPos: false
        });

        var calendar = $.calendars.instance('ummalqura');
        $('#reg_date_h').calendarsPicker({ calendar: calendar });
        $('#reg_date_h').val('').calendarsPicker('option',
            { dateFormat: calendar.ISO_8601 });


        $('#reg_date').calendarsPicker();
        $('#reg_date').val('').calendarsPicker('option',
            { dateFormat: calendar.ISO_8601 });
        //////////////////////////////////////////////
        $('#taseem_date_h').calendarsPicker({ calendar: calendar });
        $('#taseem_date_h').val('').calendarsPicker('option',
            { dateFormat: calendar.ISO_8601 });


        $('#taseem_date').calendarsPicker();
        $('#taseem_date').val('').calendarsPicker('option',
            { dateFormat: calendar.ISO_8601 });



        getHai2(<? echo intval($ld_city); ?>,<? echo intval($ld_hai); ?>);

        setCity1('<? echo $ld_country; ?>',<? echo intval($ld_city); ?>, 0)

    });





    function check_datee(val, f_name) {

        if (val != "") {

            var requester = false;
            if (window.XMLHttpRequest) {
                requester = new XMLHttpRequest;
            } else if (window.ActiveXObject) {
                requester = new ActiveXObject("Microsoft.XMLHTTP");
            }
            if (requester) {
                requester.onreadystatechange = function () {
                    if (requester.readyState == 0 || requester.readyState == 1) { }
                    if (requester.readyState == 4 || requester.readyState == "complete") {

                        if (requester.status == 200 || requester.status == 304) {


                            document.getElementById(f_name).value = (requester.responseText).trim();


                        } else {
                            document.getElementById('data_proft_years2').innerHTML = '<p><? echo $estthmar101;//هناك خطأ في طلب إستدعاء البيانات ?></p>';
                        }
                    }
                }
                requester.open("GET", "convert_dates.php?date_type=" + f_name + "&date_val=" + val, true);
                requester.send(null);
            }
        }
    }
    //]]>

</script>
<div class="dashbaordContent createProperty" style="  overflow-y: auto; height: 86vh;">


    <h1 class="createPropertyPageTitle">
        <? echo $estthmar632 ?>
    </h1>
    <form method="post" name="testform" id="testform" onSubmit="return validate_form(this);"
          action="<?php echo $editFormAction; ?>" enctype="multipart/form-data">
        <div class="createStep1">
            <div class="content createProperty stage1">
                <div class="stageContent">
                    <h3 class="contentTitle"> <? echo $edara_user_add_txt; ?></h3>

                    <div class="filtersGrid" style="margin-bottom: 5px;">

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right; ">
                            <label class="filterLabel"><? echo $estthmar570;//رقم العقار التسلسلي ?></label>
                            <div class="inputWithHintDiv">

                                <input type="text" class="filterInput" disabled="disabled"
                                       value="   <?php echo $row_Recordset1['id']; ?>">
                            </div>
                        </div>
                        <div class="ownerType" style="align-content: end;">
                            <?php
                            if ($op == "view") {

                                $query_Recordset476 = "SELECT * FROM tbl_ejar_temp_shoqa_aqd  where temp_type='edara' and aqd_id=" . $row_Recordset1['id'];
                                $Recordset476 = mysql_query($query_Recordset476) or die(mysql_error());
                                $totalRows_Recordset476 = mysql_num_rows($Recordset476);

                                //////////
                                if ($totalRows_Recordset476 != 0) {
                                    for ($j_476 = 0; $j_476 < $totalRows_Recordset476; $j_476++) {
                                        $row6 = mysql_fetch_array($Recordset476);

                                        $query_Recordset248 = "SELECT * FROM tbl_customer where id=" . $row6["malk_id"];
                                        $Recordset248 = mysql_query($query_Recordset248) or die(mysql_error());
                                        $row_Recordset248 = mysql_fetch_assoc($Recordset248);
                                        $tt = $row_Recordset248['search_name'] . "( " . $row6["malk_id"] . " )";



                                        $shoq_tim_ids6 = $shoq_tim_ids6 . "-" . $tt;
                                    }
                                    if ($row_Recordset1['id'] != "") {
                                        $query_Recordset2489 = "SELECT * FROM tbl_lead_edara where id=" . $row_Recordset1['id'];
                                        $Recordset2489 = mysql_query($query_Recordset2489) or die(mysql_error());
                                        $row_Recordset2489 = mysql_fetch_assoc($Recordset2489);
                                        $tt_emara = $row_Recordset2489['ld_name'];
                                    }
                                    echo "<strong style=\"font-size:12px;\"> شركاء - " . $shoq_tim_ids6 . " -  عمارة  " . $tt_emara . "</strong>";
                                }

                            } else {
                                $query_Recordset4 = "SELECT * FROM tbl_ejar_temp_shoqa_aqd  where  temp_type='edara' and aqd_id=" . $row_Recordset1['id'];
                                $Recordset4 = mysql_query($query_Recordset4) or die(mysql_error());
                                $row_Recordset4 = mysql_fetch_assoc($Recordset4);
                                $totalRows_Recordset1 = mysql_num_rows($Recordset4);

                                if ($totalRows_Recordset1 != 0) {



                                    $updatelist = "yes";

                                    //  include("shoqa_select_list.php");
                                }
                            }


                            if ($updatelist == "yes") {
                                $query_Recordset47 = "SELECT * FROM tbl_ejar_temp_shoqa_aqd  where  temp_type='edara' and aqd_id=" . $row_Recordset1['id'];
                                $Recordset47 = mysql_query($query_Recordset47) or die(mysql_error());
                                $row_Recordset47 = mysql_fetch_assoc($Recordset47);
                                $totalRows_Recordset47 = mysql_num_rows($Recordset47);
                                $malk_id_fromtemp = $row_Recordset47['malk_id'];
                            }

                            ?>


                            <input type="radio" id="oneOwner" name="owner_type" value="oneOwner" <? if (($_GET["sendtype"] == "shoqaselectedlist" or $updatelist == "yes") && $_GET["aqd_wehda_type"] != "to_one_from_aqd_was_many")
                                echo '';
                            else
                                echo 'checked=""'; ?>
                                   onchange="ownerTypeChange(event)">
                            <label class="radioLabel" for="oneOwner" style="margin: 0;">
                                <div class="type">

                                    <div class="textIcon">
                                        <img src="new_theme_style/img/oneOwner.svg" alt="">

                                        <span> <? echo $m_malk_moreone1;//مالك واحد ?></span>
                                    </div>

                                </div>
                            </label>

                            <input type="radio" id="multiOwner" name="owner_type" value="multiOwner" <? if (($_GET["sendtype"] == "shoqaselectedlist" or $updatelist == "yes") && $_GET["aqd_wehda_type"] != "to_one_from_aqd_was_many")
                                echo 'checked=""';
                            else
                                echo ""; ?>
                                   onchange="ownerTypeChange(event)">
                            <label class="radioLabel" for="multiOwner" style="margin: 0;">
                                <div class="type">
                                    <div class="textIcon">
                                        <img src="new_theme_style/img/oneOwner.svg" alt="">
                                        <div class="selectedMultiOwner">
                                            <span> <? echo $m_malk_moreone2;//مجموعة ملاك شركاء ?></span>

                                        </div>
                                    </div>

                                </div>
                            </label>

                        </div>

                    </div>


                    <input class='filterInput' name="aqd_one_to_many_wehdat" type="hidden" id="aqd_one_to_many_wehdat" value="<? echo $_GET["aqd_wehda_type"];
                    ?>" />
                    <? if (($_GET["sendtype"] == "shoqaselectedlist" or $updatelist == "yes") && $_GET["aqd_wehda_type"] != "to_one_from_aqd_was_many") {?>

                        <div class="multiOwnerInfo" style="display: grid;">
                            <div class="filterContainer">
                                <label for="itemUnit" class="filterLabel"> <? if ($type == "ard")
                                        echo $estthmar476;
                                    else { ?>
                                        <? if ($type == "shoqa" or $type == "janah" or $type == "mahal" or $type == "makhzan" or $type == "maktab" or $type == "mawqif" or $type == "hathera" or $type == "thlaja" or $type == "majer" or $type == "nadisehi" or $type == "worash" or $type == "rooms" or $p == "bstat" or $p == "sahat" or $p == "servpetrol" or $p == "marad" or $p == "shoqaf") { ?>
                                            <? echo $estthmar477;//مساحة الوحده ?>   <?php } else { ?>



                                            <? echo $estthmar478;// مساحة العقار ?>   <?php }
                                    } ?></label>
                                <div class="inputWithHintDiv">
                                    <input type="text" name="total_area" id="total_area"
                                           value="<?  if($row_Recordset1['total_area'] != "") echo $row_Recordset1['total_area']; else echo "100"; ?>" onkeyup="checkIfChanged3();" class="filterInput :float">
                                    <span style="width:60px;"> متر مربع
                                     </span>
                                </div>
                            </div>

                            <div class="addOwners showAddMultiOwners"  onclick="showSideSheet()">
                                <div class="selectedMultiOwner" >
                                    <span>إضافة ملاك</span>
                                    <span class="ownersAdded" id="ownersAdded_count">   </span>
                                </div>

                                <img src="new_theme_style/img/nextArrow.svg" alt="">
                            </div>
                        </div>


                    <? }?>


                    <div class="filtersGrid">
                        <? if (($_GET["sendtype"] == "shoqaselectedlist" or $updatelist == "yes") && $_GET["aqd_wehda_type"] != "to_one_from_aqd_was_many") {?>
                            <div class="sideSheet addMultiOwners"  style="display: none !important;" id="sideSheet" >
                                <?
                                include("shoqa_malk_select_list.php");

                                ?>
                                <input class='filterInput' name="malk_id" class="filterInput  :required" type="hidden" id="malk_id"
                                       value="<?php echo $row_Recordset1['malk_id']; ?>" readonly="true" />

                            </div>
                        <?}else{?>



                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $malik_txt;//المالك ?>

                                    <? $malk_id = $row_Recordset1['malk_id'];
                                    if ($malk_id != "") {
                                        if ($ld_emara_id == "")
                                            echo "<a class='popup-youtube' href='edara/area_search.php?u_id=" . $_SESSION['edara_office_id'] . "&type=malk&day=tus &form=testform&field=malk_id&field2=malk_name'> <img  style=\"CURSOR: hand\" src=\"images/select3.jpg\" alt=\"اختر المالك\"   > </a>";
                                        else
                                            echo $estthmar571;

                                    } else {
                                        echo " <a class='popup-youtube' href='edara/area_search.php?u_id=" . $_SESSION['edara_office_id'] . "&type=malk&day=tus &form=testform&field=malk_id&field2=malk_name'> <img  style=\"CURSOR: hand\" src=\"images/select3.jpg\" alt=\"اختر المالك\"    > </a> ";
                                    }
                                    ?>

                                </label>

                                <div class="inputWithHintDiv">
                                    <?
                                    if ($malk_id != "") {
                                        mysql_select_db($database_data, $data);
                                        $query_Recordset2 = "SELECT * FROM tbl_customer where id=" . $malk_id;
                                        $Recordset2 = mysql_query($query_Recordset2, $data) or die(mysql_error());
                                        $row_Recordset2 = mysql_fetch_assoc($Recordset2);
                                        $malk_name = trim(mystr_decrypt($row_Recordset2['name']));
                                        ?>

                                        <input class='filterInput' <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?> name="malk_name"
                                               type="text" id="malk_name" onChange="" readonly="true" size="32"
                                               value="<?php echo trim(mystr_decrypt($row_Recordset2['name'])); ?>">
                                        <input class='filterInput' <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?> name="malk_id"
                                               type="hidden" id="malk_id" value="<?php echo $malk_id; ?>">

                                    <? } else { ?>


                                        <input class='filterInput' <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?> name="malk_name"
                                               type="text" id="malk_name" onChange="" readonly="true" size="32"
                                               value="<?php echo trim(mystr_decrypt($row_Recordset2['name'])); ?>">

                                        <input class='filterInput' <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?> name="malk_id"
                                               type="hidden" id="malk_id" value="<?php echo $row_Recordset1['malk_id']; ?>">
                                    <? } ?>

                                </div>
                            </div>



                        <? } ?>







                        <? $p = $row_Recordset1['ld_cat_id'];
                        if ($p == "shoqa" or $p == "mahal" or $p == "makhzan" or $p == "maktab") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar411;//اختر العمارة لهذه الوحده - ان وجد ?> </label>


                                <select <? echo "disabled=\"disabled\""; ?> name="aqar_name" size="1"
                                                                            onchange="window.open('main.php?pagemenu=edara&op=<? echo $op; ?>&p=<? echo $p; ?>&id=<? echo intval($_GET["id"]); ?>&list_emara_id=' + this.options[this.selectedIndex].value, 'frame1')">

                                    <option value="" selected="selected"><? echo $estthmar412;//[ لا توجد عمارة لهذه الوحدة  ] ?></option>
                                    <?


                                    $q = mysql_query("select * from tbl_lead_edara  where  (ld_cat_id='emara'  or ld_cat_id='borj' or  ld_cat_id='emaratejari'  or  ld_cat_id='mojama'   or  ld_cat_id='block'  or ld_cat_id='mojamaskn'  ) and ld_active='yes' and ( post_status='posted'   )  " . $sql_u_edara);
                                    while ($n = mysql_fetch_array($q)) {
                                        echo "<option value=$n[id] ";

                                        if ($n[id] == $emara_id)
                                            echo "selected='selected'";
                                        echo " >$n[ld_name]</option>";
                                    }

                                    ?>

                                </select>

                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar570;//رقم العمارة التسلسلي ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' name="aqar_id" type="text" id="aqar_id" value="<? echo $emara_id; ?>"
                                           readonly="true" /> <input class='filterInput' name="type" type="hidden" id="type" />
                                    <a href="main.php?pagemenu=edara&amp;op=add&amp;p=customer&amp;type=moshtari"></a>
                                </div>
                            </div>




                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar425;// المواقف ?> </label>


                                <? if ($row_Recordset1['mawqf_alwhehdat'] != "") {
                                    $query_Recordset1tbl_list = "SELECT * FROM tbl_list where id=" . $row_Recordset1['mawqf_alwhehdat'];
                                    $Recordset1tbl_list = mysql_query($query_Recordset1tbl_list, $data) or die(mysql_error());
                                    $row_Recordset1tbl_list = mysql_fetch_assoc($Recordset1tbl_list);
                                    $totalRows_Recordset1tbl_list = mysql_num_rows($Recordset1tbl_list);


                                }


                                $mawqf_alwhehdatid = 0;
                                $emara_id_to_mawqef = "mawqf_" . $emara_id;

                                $q = "SELECT  distinct id ,name FROM tbl_list  where  id not in (
                       SELECT  distinct s.id as id  FROM tbl_list as s,tbl_lead_edara as l  where type='$emara_id_to_mawqef'
                       and l.mawqf_alwhehdat=s.id ) and type='$emara_id_to_mawqef'   " . $sql_u_edara . " ORDER BY 'name' DESC";

                                $result2 = mysql_query($q);
                                if (!$result2) {
                                    die("Query to show fields from table failed");
                                }

                                echo "<SELECT name=mawqf_alwhehdat      >
                                             <option value=\"" . $row_Recordset1['mawqf_alwhehdat'] . "\" selected=\"selected\">" . $row_Recordset1tbl_list['name'] . "</option>";


                                while ($row = mysql_fetch_row($result2)) {
                                    echo " <option value=$row[0]";
                                    //	 if($row[0]==$row_Recordset1['mawqf_alwhehdat']){echo" selected";}
                                    echo ">" . $row[1] . "</option>";

                                }
                                echo "</select>";

                                mysql_free_result($result2); ?>
                                <?php

                                echo " <img style=\"CURSOR: hand\" src=\"img/add-icon.gif\" alt=\"اضف\"  width=\"25px\"    onClick='javDESCript:window.open(\"edara/list_add.php?office_id=" . $_SESSION['edara_office_id'] . "&type=$emara_id_to_mawqef&form=form1&field=sat_ar_h&field2=sat_ar\",\"\",\"top=50,left=400,width=416,height=166,menubar=no,toolbar=no,scrollbars=no,resizable=no,status=no\"); return false;'
                                   >"; ?>
                                <?
                                echo " <img  style=\"CURSOR: hand\" src=\"img/edit-icon.gif\" alt=\"تعديل \" width=\"25px\"     onClick='javDESCript:window.open(\"edara/list_list.php?office_id=" . $_SESSION['edara_office_id'] . "&type=$emara_id_to_mawqef&form=form1&field=sat_ar_h&field2=sat_ar\",\"\",\"top=50,left=400,width=633,height=444,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   >";
                                ?>
                            </div>

                        <? } ?>


                        <?
                        mysql_select_db($database_data, $data);
                        $query_Recordset2 = "SELECT * FROM tbl_customer where id=" . $row_Recordset1['malk_id'];
                        $Recordset2 = mysql_query($query_Recordset2, $data) or die(mysql_error());
                        $row_Recordset2 = mysql_fetch_assoc($Recordset2);

                        ?>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right; clear:right">
                            <label class="filterLabel"><? echo $date_txt;//التاريخ ?> <? echo $m_txt;//م ?> </label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="ld_date" <? if ($op == "view" or $emara_id != "")
                                    echo "readonly=\"true\""; ?>
                                       value="<?php echo $ld_date; ?>" class=":date1 :required" size="32" />
                            </div>
                        </div>

                        <? if ($emara_id == "") { ?>
                        <? } ?>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $date_txt;//التاريخ ?> <? echo $h_txt;//هـ ?> </label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="ld_date_h" <? if ($op == "view" or $emara_id != "")
                                    echo "readonly=\"true\""; ?>
                                       value="<?php echo $ld_date_h; ?>" class=":date1 :required" size="32" />
                            </div>
                        </div>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar429;// رقم ?> <? $x = $p;

                                if ($x == "shoqa")
                                    echo $estthmar430;
                                else
                                    if ($x == "emara")
                                        echo $cust_report47;
                                    else
                                        if ($x == "vela")
                                            echo $estthmar572;
                                        else
                                            if ($x == "mahal")
                                                echo $estthmar573;
                                            else
                                                if ($x == "ard")
                                                    echo $cust_report63;
                                                else if ($x == "makhzan")
                                                    echo $estthmar435;
                                                else if ($x == "borj")
                                                    echo $estthmar436;
                                                else if ($x == "mazra")
                                                    echo $estthmar437;
                                                else
                                                    if ($x == "worash")
                                                        echo $estthmar48;
                                                    else
                                                        if ($x == "servpetrol")
                                                            echo $estthmar51;
                                                        else if ($x == "koshk")
                                                            echo $estthmar52;
                                                        else
                                                            if ($x == "hathera") {

                                                                $query_Recordset2 = "SELECT * FROM tbl_cat where cat_id='$x'";
                                                                $Recordset2 = mysql_query($query_Recordset2, $data) or die(mysql_error());
                                                                $row_Recordset2 = mysql_fetch_assoc($Recordset2);
                                                                if ($_SESSION['def_lang'] == "en")
                                                                    echo $row_Recordset2['cat_name_en'];
                                                                else
                                                                    echo $row_Recordset2['cat_name'];

                                                            } else if ($x == "thlaja")
                                                                echo "ثلاجة";
                                                            else
                                                                if ($x == "majer")
                                                                    echo "  مستودعات";
                                                                else
                                                                    if ($x == "nadisehi")
                                                                        echo "نادي صحي";
                                                                    else
                                                                        if ($x == "msahat")
                                                                            echo $estthmar53;
                                                                        else
                                                                            if ($x == "mawqif")
                                                                                echo $estthmar439;
                                                                            else
                                                                                if ($x == "bstat")
                                                                                    echo $estthmar55;
                                                                                else
                                                                                    if ($x == "sahat")
                                                                                        echo $estthmar56;
                                                                                    else
                                                                                        if ($x == "shoqaf")
                                                                                            echo $estthmar574;
                                                                                        else
                                                                                            if ($x == "rooms")
                                                                                                echo $estthmar57;
                                                                                            else
                                                                                                if ($x == "janah")
                                                                                                    echo $estthmar58;
                                                                                                else
                                                                                                    if ($x == "janah")
                                                                                                        echo $estthmar58;
                                                                                                    else
                                                                                                        if ($x == "block")
                                                                                                            echo $estthmar575;
                                                                                                        else
                                                                                                            if ($x == "haiaqari")
                                                                                                                echo $estthmar576;
                                                                                                            else
                                                                                                                if ($x == "wkalh")
                                                                                                                    echo $estthmar577;
                                                                                                                else if ($x == "faraa")
                                                                                                                    echo "فرع";
                                                                                                                else if ($x == "store")
                                                                                                                    echo "مستودع";
                                                                                                                else if ($x == "pos")
                                                                                                                    echo "POS";
                                                                                                                else
                                                                                                                    if ($x == "qeta")
                                                                                                                        echo "قطعة";
                                                                                                                    else
                                                                                                                        if ($x == "haraj")
                                                                                                                            echo $estthmar578;
                                                                                                                        else if ($x == "rest")
                                                                                                                            echo $estthmar579;
                                                                                                                        else
                                                                                                                            if ($x == "mahta")
                                                                                                                                echo $estthmar580;
                                                                                                                            else
                                                                                                                                if ($x == "markazsianeh")
                                                                                                                                    echo $estthmar65;
                                                                                                                                else
                                                                                                                                    if ($x == "markaztijari")
                                                                                                                                        echo $estthmar66;
                                                                                                                                    else
                                                                                                                                        if ($x == "marad")
                                                                                                                                            echo $estthmar67;
                                                                                                                                        else if ($x == "shaleh")
                                                                                                                                            echo $estthmar68;
                                                                                                                                        else if ($x == "mojama")
                                                                                                                                            echo $estthmar443;
                                                                                                                                        else {

                                                                                                                                            $query_Recordset2 = "SELECT * FROM tbl_cat where cat_id='$x'";
                                                                                                                                            $Recordset2 = mysql_query($query_Recordset2, $data) or die(mysql_error());
                                                                                                                                            $row_Recordset2 = mysql_fetch_assoc($Recordset2);
                                                                                                                                            if ($_SESSION['def_lang'] == "en")
                                                                                                                                                echo $row_Recordset2['cat_name_en'];
                                                                                                                                            else
                                                                                                                                                echo $row_Recordset2['cat_name'];

                                                                                                                                        }


                                ?>
                            </label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' type="text" name="shoqa_id"
                                       value="<?php echo $row_Recordset1['ld_shoqa_id']; ?>" class=":required:" size="32" <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> />
                            </div>
                        </div>





                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar586;//وصف العقار ?> </label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="ld_name" value="<?php echo $row_Recordset1['ld_name']; ?>" size="32" />
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar585;//تصنيف العقار ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> style="width:152px"
                                       type="hidden" name="ld_cat_id" value="<?php echo $row_Recordset1['ld_cat_id']; ?>" size="32">
                                <input type="text" class="filterInput " disabled="disabled"
                                       value=" <?php echo $type = $row_Recordset1['ld_cat_id']; ?>">
                            </div>
                        </div>


                        <? if ($type == "qasr" or $type == "vela") { ?>

                            <? if ($_SERVER['SERVER_NAME'] == "www.alwaseelresort.com.sa" or $_SERVER['SERVER_NAME'] == "alwaseelresort.com.sa") { ?>

                                <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                    <label class="filterLabel"><? echo $estthmar421;// تاريخ التسليم ?>     <? echo $m_txt;//م ?></label>
                                    <div class="inputWithHintDiv">
                                        <input class='filterInput' type="text" <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?>
                                               name="taseem_date" id="taseem_date" value="<?php echo $row_Recordset1['taseem_date']; ?>"
                                               class="filterInput cal-field  :date1 :required" size="32" autocomplete="off"
                                               onchange="check_datee(this.value,'taseem_date_h')" readonly="true" />
                                    </div>
                                </div>


                                <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                    <label class="filterLabel"><? echo $estthmar421;// تاريخ التسليم ?>     <? echo $h_txt;// هـ ?></label>
                                    <div class="inputWithHintDiv"> <input class='filterInput' type="text" <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?> name="taseem_date_h" id="taseem_date_h"
                                                                          value="<?php echo $row_Recordset1['taseem_date_h']; ?>"
                                                                          class="filterInput cal-field  :date1 :required" size="32" autocomplete="off"
                                                                          onchange="check_datee(this.value,'taseem_date')" readonly="true" />

                                    </div>
                                </div>

                            <? }
                        } ?>

                        <input class='filterInput' type="hidden" name="ld_type_id"
                               value="<? echo $row_Recordset1['ld_type_id']; ?>" />
                        <? if ($_SERVER['SERVER_NAME'] != "aljawharabuilding.com" or $_SERVER['SERVER_NAME'] == "www.aljawharabuilding.com") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar476;//المساحة    الكلية ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?>
                                           onkeyup="checkIfChanged3();" type="text" name="total_area"
                                           value="<?php echo $row_Recordset1['total_area']; ?>" size="32">
                                </div>
                            </div>
                        <? } ?>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $meter_price;// سعر المتر ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?>
                                       onkeyup="checkIfChanged3();" class=":float" type="text" name="ld_meter_price"
                                       value="<?php echo $row_Recordset1['ld_meter_price']; ?>" size="32">
                            </div>
                        </div>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"> <? echo $estthmar479;//قيمة البيع أو الايجار ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="total_price" value="<?php echo $row_Recordset1['total_price']; ?>" size="32">
                            </div>
                        </div>


                        <script type="text/javascript">
                            function checkIfChanged3() {
                                document.testform.total_price.value = (document.testform.total_area.value) * document.testform.ld_meter_price.value;
                            }
                        </script>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar480;//مساحة المسطحات ?> </label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' type="text" name="mosatahat_area"
                                       value="<?php echo $row_Recordset1['mosatahat_area']; ?>" size="32">
                            </div>
                        </div>








                        <? if ($type == "pos") { ?>

                            <input class='filterInput' name="is_proj" type="hidden" value="inv">


                        <? }
                        if ($type == "shoqaf") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar463;//عدد الأجنحة ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_janah_emara" value="<?php echo $row_Recordset1['number_janah_emara']; ?>" size="32">
                                </div>

                            </div>

                        <? }
                        if ($type == "faraa") { ?>

                            <input class='filterInput' name="is_proj" type="hidden" value="inv">

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel">عدد المستودعات </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_store_emara" value="<?php echo $row_Recordset1['number_store_emara']; ?>" size="32">
                                </div>
                            </div>

                        <? }
                        if ($type == "store") { ?>

                            <input class='filterInput' name="is_proj" type="hidden" value="inv">


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel">عدد نقاط البيع - POS

                                    <?php
                                    $is_emara = "";

                                    if ($row_Recordset1['ld_cat_id'] == "store") {
                                        if ($row_Recordset1['post_status'] == "posted") {
                                            echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                        }
                                    }
                                    ?>


                                </label>
                                <div class="inputWithHintDiv">

                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_pos_emara" value="<?php echo $row_Recordset1['number_pos_emara']; ?>" size="32">
                                </div>
                            </div>


                        <? }
                        if ($type == "vela" or $type == "emara" or $type == "borj" or $type == "mojama" or $type == "emaratejari" or $type == "mojamaskn") { ?>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar460;//إجمالي عدد الشقق  بالمبنى ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_shoqa_dor_emara" value="<?php echo $row_Recordset1['number_shoqa_dor_emara']; ?>"
                                           size="32">
                                </div>
                            </div>


                        <? }
                        if ($type == "emara" or $type == "borj" or $type == "mojama" or $type == "emaratejari" or $type == "mojamaskn") { ?>



                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar506;//عدد    الادوار ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_of_adwar_emara" value="<?php echo $row_Recordset1['number_of_adwar_emara']; ?>"
                                           size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar507;//عدد الادوار التجارية ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_adwar_tejare_emara" value="<?php echo $row_Recordset1['number_adwar_tejare_emara']; ?>"
                                           size="32">
                                </div>
                            </div>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar457;//عدد المكاتب ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_maktab_emara" value="<?php echo $row_Recordset1['number_maktab_emara']; ?>" size="32">
                                </div>
                            </div>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar458;//عدد المحلات ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_mahal_emara" value="<?php echo $row_Recordset1['number_mahal_emara']; ?>" size="32">
                                </div>
                            </div>



                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"> <? echo $estthmar459;// عدد المخازن    والمستودعات ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_mostawda_emara" value="<?php echo $row_Recordset1['number_mostawda_emara']; ?>"
                                           size="32">
                                </div>
                            </div>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar461;//عدد المعارض ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_marad_emara" value="<?php echo $row_Recordset1['number_marad_emara']; ?>" size="32">
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar462;//عدد الغرف ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_rooms_emara" value="<?php echo $row_Recordset1['number_rooms_emara']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar463;//عدد الأجنحة ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_janah_emara" value="<?php echo $row_Recordset1['number_janah_emara']; ?>" size="32">
                                </div>
                            </div>



                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label
                                    class="filterLabel"><? if ($_SERVER['SERVER_NAME'] == "alajial-holding.net" or $_SERVER['SERVER_NAME'] == "www.alajial-holding.net")
                                        echo "عدد الأراضي";
                                    else
                                        echo $estthmar471;//عدد المطاعم ?>
                                </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_rest_emara" value="<?php echo $row_Recordset1['number_rest_emara']; ?>" size="32">

                                </div>


                            </div>





                            <? if ($_SERVER['SERVER_NAME'] == "www.rmozco.net" or $_SERVER['SERVER_NAME'] == "rmozco.net")
                                ;
                            else { ?>


                                <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                    <label class="filterLabel"><? echo $estthmar464;//عدد الورش ?> </label>
                                    <div class="inputWithHintDiv">
                                        <input class='filterInput' <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?> type="text"
                                               name="number_worash_emara" value="<?php echo $row_Recordset1['number_worash_emara']; ?>" size="32">
                                    </div>
                                </div>

                                <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                    <label class="filterLabel"><? echo $estthmar466;//عدد الخدمات البترولية ?></label>
                                    <div class="inputWithHintDiv">
                                        <input class='filterInput' type="text" <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?>
                                               name="number_servpetrol_emara" value="<?php echo $row_Recordset1['number_servpetrol_emara']; ?>"
                                               size="32">
                                    </div>
                                </div>
                                <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                    <label class="filterLabel"><? echo $estthmar468;//عدد كشك ?></label>
                                    <div class="inputWithHintDiv">
                                        <input class='filterInput' type="text" <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?>
                                               name="number_koshk_emara" value="<?php echo $row_Recordset1['number_koshk_emara']; ?>" size="32">
                                    </div>
                                </div>

                                <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                    <label class="filterLabel"><? echo $estthmar469;//عدد مساحة ?></label>
                                    <div class="inputWithHintDiv">
                                        <input class='filterInput' type="text" <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?>
                                               name="number_msahat_emara" value="<?php echo $row_Recordset1['number_msahat_emara']; ?>" size="32">
                                    </div>
                                </div>

                                <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                    <label class="filterLabel"><? echo $user_text148;//عدد ثلاجة ?></label>
                                    <div class="inputWithHintDiv">
                                        <input class='filterInput' type="text" <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?>
                                               name="number_thlaja_emara" value="<?php echo $row_Recordset1['number_thlaja_emara']; ?>" size="32">
                                    </div>
                                </div>
                                <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                    <label class="filterLabel"><? echo $user_text462;//  مستودعات عدد ?></label>
                                    <div class="inputWithHintDiv">
                                        <input class='filterInput' type="text" <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?>
                                               name="number_majer_emara" value="<?php echo $row_Recordset1['number_majer_emara']; ?>" size="32">
                                    </div>
                                </div>

                                <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                    <label class="filterLabel"><? echo $user_text576;//عدد ?>
                                        <?

                                        $query_Recordset2 = "SELECT * FROM tbl_cat where cat_id='hathera'";
                                        $Recordset2 = mysql_query($query_Recordset2, $data) or die(mysql_error());
                                        $row_Recordset2 = mysql_fetch_assoc($Recordset2);
                                        if ($_SESSION['def_lang'] == "en")
                                            echo $row_Recordset2['cat_name_en'];
                                        else
                                            echo $row_Recordset2['cat_name'];

                                        //عدد حضائر ?>
                                    </label>
                                    <div class="inputWithHintDiv">
                                        <input class='filterInput' type="text" <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?>
                                               name="number_hathera_emara" value="<?php echo $row_Recordset1['number_hathera_emara']; ?>"
                                               size="32">
                                    </div>
                                </div>

                                <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                    <label class="filterLabel"><? echo $user_text301;//عدد بسطات ?></label>
                                    <div class="inputWithHintDiv">
                                        <input class='filterInput' type="text" <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?>
                                               name="number_bstat_emara" value="<?php echo $row_Recordset1['number_bstat_emara']; ?>" size="32">
                                    </div>
                                </div>

                            <? } ?>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar465;//عدد الفلل ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_vela_emara" value="<?php echo $row_Recordset1['number_vela_emara']; ?>" size="32">
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar467;//عدد المواقف ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' type="text" <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?>
                                           name="number_mawqif_emara" value="<?php echo $row_Recordset1['number_mawqif_emara']; ?>" size="32">
                                </div>
                            </div>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $user_text147;// عدد نادي صحي ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' type="text" <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?>
                                           name="number_nadisehi_emara" value="<?php echo $row_Recordset1['number_nadisehi_emara']; ?>"
                                           size="32">
                                </div>
                            </div>





                            <?
                            $sql33 = "SELECT * FROM tbl_cat WHERE  cat_id like 'ha_cat%'  and cat_active='yes'";
                            $rs33 = mysql_query($sql33);

                            $rows33 = mysql_num_rows($rs33);
                            if ($rows33 != 0) {


                                for ($j33 = 0; $j33 < $rows33; $j33++) {
                                    $row33 = mysql_fetch_array($rs33);

                                    ?>




                                    <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                        <label class="filterLabel"><? echo $user_text576;//عدد ?>
                                            <?
                                            if ($_SESSION['def_lang'] == "en")
                                                echo $row33["cat_name_en"];//عدد بسطات
                                            else
                                                echo $row33["cat_name"];//عدد بسطات

                                            ?></label>
                                        <div class="inputWithHintDiv">
                                            <input class='filterInput' type="text" <? if ($op == "view")
                                                echo "disabled=\"disabled\""; ?>
                                                   name="number_<? echo $row33["cat_id"]; ?>_emara" value="<?php

                                            $caaa = "number_" . $row33["cat_id"] . "_emara";
                                            echo $row_Recordset1[$caaa]; ?>" size="32">
                                        </div>
                                    </div>

                                <? }
                            } ?>







                        <? } ?>

                        <?
                        if ($type == "mokhatat") { ?>



                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar470;//عدد البلوكات - B ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_block_emara" value="<?php echo $row_Recordset1['number_block_emara']; ?>" size="32">

                                </div>


                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "haiaqari") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>






                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $m_estthmar458_1;//'عدد القطع' ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_qeta_emara" value="<?php echo $row_Recordset1['number_qeta_emara']; ?>" size="32">
                                </div>




                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "haiaqari") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>




                            <?
                        }
                        if ($type == "haiaqari") { ?>



                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar470;//عدد البلوكات - B ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_block_emara" value="<?php echo $row_Recordset1['number_block_emara']; ?>" size="32">
                                    </p>

                                </div>


                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "haiaqari") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>






                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $m_estthmar458_1;//'عدد القطع' ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_qeta_emara" value="<?php echo $row_Recordset1['number_qeta_emara']; ?>" size="32">
                                </div>




                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "haiaqari") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>







                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar584;//عدد مركز تجاري ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_markaztijari_emara" value="<?php echo $row_Recordset1['number_markaztijari_emara']; ?>"
                                           size="32">
                                </div>



                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "haiaqari") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>





                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar472;//عدد المحطات ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_mahta_emara" value="<?php echo $row_Recordset1['number_mahta_emara']; ?>" size="32">

                                </div>


                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "haiaqari") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>







                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label
                                    class="filterLabel"><? if ($_SERVER['SERVER_NAME'] == "alajial-holding.net" or $_SERVER['SERVER_NAME'] == "www.alajial-holding.net")
                                        echo "عدد الأراضي";
                                    else
                                        echo $estthmar471;//عدد المطاعم ?>
                                </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_rest_emara" value="<?php echo $row_Recordset1['number_rest_emara']; ?>" size="32">
                                </div>



                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "haiaqari") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>




                        <? } ?>




                        <? if ($type == "block") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar583;//عدد مركز صيانة ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_markazsianeh_emara" value="<?php echo $row_Recordset1['number_markazsianeh_emara']; ?>"
                                           size="32">
                                </div>



                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "block") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>



                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label><? echo $estthmar464;//عدد الورش ?></label> <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text" name="number_worash_emara"
                                                                                          value="<?php echo $row_Recordset1['number_worash_emara']; ?>" size="32"></div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar461;//عدد المعارض ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_marad_emara" value="<?php echo $row_Recordset1['number_marad_emara']; ?>" size="32">
                                </div>



                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "block") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>




                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar473;//عدد الوكالات ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_wkalh_emara" value="<?php echo $row_Recordset1['number_wkalh_emara']; ?>" size="32">
                                </div>




                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "block") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>



                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $m_estthmar458_1;//عدد قطع ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_qeta_emara" value="<?php echo $row_Recordset1['number_qeta_emara']; ?>" size="32">


                                </div>


                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "block") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>





                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar474;//عدد الحراجات ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_haraj_emara" value="<?php echo $row_Recordset1['number_haraj_emara']; ?>" size="32">
                                </div>



                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "block") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>







                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar458;//عدد المحلات ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_mahal_emara" value="<?php echo $row_Recordset1['number_mahal_emara']; ?>" size="32">
                                </div>



                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "block") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>



















                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar457;//عدد المكاتب ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_maktab_emara" value="<?php echo $row_Recordset1['number_maktab_emara']; ?>" size="32">
                                </div>



                            </div>


                            <?php
                            $is_emara = "";

                            if ($row_Recordset1['ld_cat_id'] == "block") {
                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
                                   > ";
                                }
                            }
                            ?>















                        <? } ?>

                        <?php
                        if ($op == "view" or $emara_id != "") { ?>



                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $country_txt;//الدولة ?> </label>
                                <select <? if ($op == "view" or $emara_id != "")
                                    echo "readonly=\"true\""; ?> name=country
                                                                 onChange="AjaxFunction(this.value);">
                                    <option value=''><? echo $contry_choose;//اختر الدولة ?></option>
                                    <?




                                    $q = mysql_query("select * from tbl_country  where co_arab='1' ");
                                    while ($n = mysql_fetch_array($q)) {
                                        echo "<option value=$n[co_id] ";

                                        if ($n[co_id] == $ld_country)
                                            echo "selected='selected'";
                                        if ($_SESSION['def_lang'] == "en")
                                            echo " >$n[co_name_en]</option>";
                                        else
                                            echo " >$n[co_name]</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $$estthmar73;
                                    echo " " . $city_txt;//المدينة ?></label>


                                <select <? if ($op == "view" or $emara_id != "")
                                    echo "readonly=\"true\""; ?> name=city
                                                                 onChange="AjaxFunction2(this.value);">


                                    <?



                                    $q = mysql_query("select * from tbl_city  where co_ci_id='$ld_country' ");
                                    while ($n = mysql_fetch_array($q)) {
                                        echo "<option value=$n[ci_id] ";

                                        if ($n[ci_id] == $ld_city)
                                            echo "selected='selected'";

                                        if ($_SESSION['def_lang'] == "en")
                                            echo " >$n[ci_name_en]</option>";
                                        else
                                            echo " >$n[ci_name]</option>";
                                    }

                                    ?>
                                </select>
                            </div>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar447;//الحي ?></label>

                                <select <? if ($op == "view" or $emara_id != "")
                                    echo "readonly=\"true\""; ?> name=city2>

                                    <?


                                    $q = mysql_query("select * from tbl_hai  where ha_ci_id='$ld_city'  ");
                                    while ($n = mysql_fetch_array($q)) {
                                        echo "<option value=$n[ha_id] ";

                                        if ($n[ha_id] == $ld_hai)
                                            echo "selected='selected'";
                                        if ($_SESSION['def_lang'] == "en")
                                            echo " >$n[ha_name_en]</option>";
                                        else
                                            echo " >$n[ha_name]</option>";
                                    }

                                    ?>
                                </select>
                            </div>
                        <? } else { ?>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar448;//الموقع ?></label>
                                <select name=country class=":required" onChange="getCity(this.value);">


                                    <option value=''><? echo $contry_choose;//اختر الدولة ?></option>
                                    <?



                                    $q = mysql_query("select * from tbl_country  where co_arab='1' ");
                                    while ($n = mysql_fetch_array($q)) {
                                        echo "<option value=$n[co_id] ";

                                        if ($n[co_id] == $ld_country)
                                            echo "selected='selected'";
                                        if ($_SESSION['def_lang'] == "en")
                                            echo " >$n[co_name_en]</option>";
                                        else
                                            echo " >$n[co_name]</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $city_txt;//المدينة ?> </label>

                                <div id="content_city"> </div>

                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar447;//الحي ?></label>

                                <select name=ld_hai id="content_hai">


                                </select>
                            </div>

                        <? } ?>
                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $edara_user_add11_txt;//العنوان ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="address" value="<?php echo $row_Recordset1['address']; ?>" size="32">
                            </div>
                        </div>















                    </div>






                </div>

                <div class="navigationActions" style="justify-content: end; gap: 20px;">

                    <div class=""></div>



                    <div class="formStepBtn next next1" onClick="goToOptional()">
                        <div class="text">
                            <span class="btnNext1"><? echo $estthmar606; ?></span>
                            <span class="stepName"> <? echo $estthmar322; ?> </span>
                        </div>

                        <img src="new_theme_style/img/nextArrowWhiteNavButton.svg" alt="">
                    </div>

                    <div class="formStepBtn next next3" onclick="createBuilding()">

                        <div class="text">
                            <span class="btnNext3"> حفظ نهائي </span>
                        </div>
                        <img src="new_theme_style/img/nextArrowWhiteNavButton.svg" alt="">
                    </div>




                </div>


            </div>
            <div class="content createProperty stage3">
                <div class="stageContent">
                    <h3 class="contentTitle"> <? echo $estthmar322; ?> </h3>



                    <div class="filtersGrid">




                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel">
                                <? if ($type == "shoqa" or $type == "mahal" or $type == "makhzan" or $type == "maktab" or $type == "vela" or $type == "worash" or $type == "rooms" or $p == "mawqif" or $type == "bstat" or $type == "sahat" or $type == "janah" or $type == "servpetrol" or $type == "marad" or $type == "shoqaf") { ?>  <? echo $estthmar481;//الرمز والصندزق البريدي ?><?php } else { ?>



                                    <? echo $estthmar481;//الرمز والصندزق البريدي ?><?php } ?>
                            </label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' type="text" <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?>
                                       name="code_almabna" value="<?php echo $row_Recordset1['code_almabna']; ?>" size="32">

                            </div>


                        </div>



                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"> <? echo $user_text464;//العنوان الوطني ?></label>
                            <div class="inputWithHintDiv">

                                <input class='filterInput' type="text" <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?>
                                       name="enwan_watani" value="<?php echo $row_Recordset1['enwan_watani']; ?>" size="32">
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"> <? echo $user_text465;//  الرقم الاضافي ?></label>
                            <div class="inputWithHintDiv">

                                <input class='filterInput' type="text" <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?>
                                       name="raqam_dafi" value="<?php echo $row_Recordset1['raqam_dafi']; ?>" size="32">
                            </div>
                        </div>



                        <? if ($type == "vela" or $type == "qasr") { ?>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar532;// الجهة ?> </label>
                                <?
                                $aljehaid = $row_Recordset1['aljeha'];
                                $sql_u_edara = " and u_edara_office_id=" . myint_decrypt($_SESSION['edara_office_id']) . "  ";

                                $q = "SELECT  distinct id ,name FROM tbl_list  where type='aljeha' " . $sql_u_edara . " ORDER BY 'name' DESC";
                                $result2 = mysql_query($q);
                                echo " <select     name=aljeha   >
                      <option value=\"\" selected=\"selected\">[ $estthmar533 ]</option>";


                                while ($row = mysql_fetch_row($result2)) {
                                    echo " <option value=$row[0]";
                                    if ($row[0] == $aljehaid) {
                                        echo " selected";
                                    }
                                    echo ">" . $row[1] . "</option>";

                                }
                                echo "</select>";

                                mysql_free_result($result2); ?>
                                <?php

                                echo " <img style=\"CURSOR: hand\" src=\"img/add-icon.gif\" alt=\"اضف\"     onClick='javDESCript:window.open(\"edara/list_add.php?office_id=" . $_SESSION['edara_office_id'] . "&type=aljeha&form=form1&field=sat_ar_h&field2=sat_ar\",\"\",\"top=50,left=400,width=416,height=166,menubar=no,toolbar=no,scrollbars=no,resizable=no,status=no\"); return false;'
					  >"; ?>
                                <?
                                echo " <img  style=\"CURSOR: hand\" src=\"img/edit-icon.gif\" alt=\"تعديل \"     onClick='javDESCript:window.open(\"edara/list_list.php?office_id=" . $_SESSION['edara_office_id'] . "&type=aljeha&form=form1&field=sat_ar_h&field2=sat_ar\",\"\",\"top=50,left=400,width=633,height=444,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
					  >";
                                ?>
                            </div>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar534;//مساحة الارض ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' type="text" name="added_area"
                                           value="<?php echo $row_Recordset1['added_area']; ?>" size="32">
                                </div>
                            </div>
                        <? } ?>




                        <? if ($type == "shoqa" or $type == "vela") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar462;//عدد الغرف ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="rooms_temp" value="<?php echo $row_Recordset1['rooms_temp']; ?>" size="32">
                                </div>
                            </div>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar516;//ارضية الغرف ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="ardeairoom" value="<?php echo $row_Recordset1['ardeairoom']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar517;//ارضية الحمامات ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="ardeabath" value="<?php echo $row_Recordset1['ardeabath']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar518;//ارضية المطابخ ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="ardeaketchin" value="<?php echo $row_Recordset1['ardeaketchin']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar519;//جدران الغرف ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="jodranroom" value="<?php echo $row_Recordset1['jodranroom']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar520;//جدران المطبخ ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="jodranketchin" value="<?php echo $row_Recordset1['jodranketchin']; ?>" size="32">
                                </div>
                            </div>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar521;//جدران الحمامات ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="jodranbaths" value="<?php echo $row_Recordset1['jodranbaths']; ?>" size="32">
                                </div>
                            </div>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar522;//الأسقف ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="alasqof" value="<?php echo $row_Recordset1['alasqof']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"> <? echo $estthmar523;//عدد    الغرف المستقلة ?>


                                    <?php
                                    $is_emara = "";

                                    if ($row_Recordset1['ld_cat_id'] == "shoqa") {
                                        if ($row_Recordset1['post_status'] == "posted") {
                                            echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
					  > ";
                                        }
                                    }
                                    ?>


                                </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_rooms_emara" value="<?php echo $row_Recordset1['number_rooms_emara']; ?>" size="32">



                                </div>

                            </div>







                        <? } ?>
                        <? if ($type == "shoqa") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar582;//تطل على ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="totel_on" value="<?php echo $row_Recordset1['totel_on']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar525;//وضع الشقة ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="shoqa_status" value="<?php echo $row_Recordset1['shoqa_status']; ?>" size="32">
                                </div>
                            </div>
                        <? } ?>
                        <? //if($type=="shoqa" or $type=="vela")
                        { ?>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $edara_rep_print2024_12;//محتويات الوحدة ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="mohtawaiat" value="<?php echo $row_Recordset1['mohtawaiat']; ?>" size="32">
                                </div>
                            </div>
                        <? }
                        if ($type == "shoqa" or $type == "vela") { ?>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar526;//عدد المكيفات ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="addmokaifat" value="<?php echo $row_Recordset1['addmokaifat']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar527;//عدد المغاسل ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="magasel_number" value="<?php echo $row_Recordset1['magasel_number']; ?>" size="32">
                                </div>
                            </div>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar529;//عدد المطابخ ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="kethen" value="<?php echo $row_Recordset1['kethen']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar530;//عدد الحمامات ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text" name="baths"
                                           value="<?php echo $row_Recordset1['baths']; ?>" size="32">
                                </div>
                            </div>

                        <? } ?>
                        <? if ($type == "shoqa" or $type == "vela" or $type == "mahal" or $type == "makhzan") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar531;//نوع التشطيب ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="tashteb_type" value="<?php echo $row_Recordset1['tashteb_type']; ?>" size="32">
                                </div>
                            </div>

                        <? } ?>


                        <? if ($type == "shoqa" or $type == "vela" or $type == "mahal" or $type == "makhzan") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar535;//حصة    في الارض ?></label>
                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="hosa_felard" id="hosa_felard">
                                    <option <?php if ($row_Recordset1['hosa_felard'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['hosa_felard'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>
                            </div>


                        <? } ?>





                        <?
                        if ($emara_id == "") { ?>
                            <? if ($_SERVER['SERVER_NAME'] != "aljawharabuilding.com" or $_SERVER['SERVER_NAME'] != "www.aljawharabuilding.com") { ?>


                            <? } ?><? } ?>




                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar482;//القيمة الدفترية الكلي ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> class=":float"
                                       type="text" name="price_daftar" value="<?php echo $row_Recordset1['price_daftar']; ?>" size="32">
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar483;//القيمة حسب الصك ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> class=":float"
                                       type="text" name="price_saq" value="<?php echo $row_Recordset1['price_saq']; ?>" size="32">
                            </div>
                        </div>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar484;//القيمة السوقية للارض ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> class=":float"
                                       type="text" name="price_soqiah_ard" value="<?php echo $row_Recordset1['price_soqiah_ard']; ?>"
                                       size="32">
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar485;//القيمة السوقية للمنشأة ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> class=":float"
                                       type="text" name="price_soqiah_monsha" value="<?php echo $row_Recordset1['price_soqiah_monsha']; ?>"
                                       size="32">
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar486;//القيمة الدفترية للارض ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> class=":float"
                                       type="text" name="price_dftr_ard" value="<?php echo $row_Recordset1['price_dftr_ard']; ?>"
                                       size="32">
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label filterLabel><? echo $estthmar487;//القيمة الدفترية للمنشأة ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> class=":float"
                                       type="text" name="price_dftr_monsha" value="<?php echo $row_Recordset1['price_dftr_monsha']; ?>"
                                       size="32">
                            </div>
                        </div>



                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar76;//رسوم الأراضى ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="rosom_aradi" value="<?php echo $row_Recordset1['rosom_aradi']; ?>" size="32">

                            </div>
                        </div>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"> <? echo $estthmar74;//الملكية القانونية ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="melkia_qanoniah" value="<?php echo $row_Recordset1['melkia_qanoniah']; ?>" size="32">.
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar75;//الملكية الأقتصادي ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="melkia_eqtsadiah" value="<?php echo $row_Recordset1['melkia_eqtsadiah']; ?>" size="32">
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar77;//الشركة المسجل به العقار ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="co_aqar_mosajal" value="<?php echo $row_Recordset1['co_aqar_mosajal']; ?>" size="32">
                            </div>
                        </div>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar508;// المساحة حسب التنظيم ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> class=":float"
                                       type="text" name="area_tanzem" value="<?php echo $row_Recordset1['area_tanzem']; ?>" size="32">
                            </div>
                        </div>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar509;//تاريخ الكروكي ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="kroki_date" value="<?php echo $row_Recordset1['kroki_date']; ?>" size="32">
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"> <? echo $estthmar510;//رقم الكروكي - المخطط ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="kroki_number" value="<?php echo $row_Recordset1['kroki_number']; ?>" size="32">
                            </div>

                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar71;// تاريخ الصك ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="saq_date" value="<?php echo $row_Recordset1['saq_date']; ?>" size="32">
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar70;// رقم الصك ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="saq_number" value="<?php echo $row_Recordset1['saq_number']; ?>" size="32">

                            </div>
                        </div>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar86;//نوع التنمية ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="no3_tanmeh" value="<?php echo $row_Recordset1['no3_tanmeh']; ?>" size="32">

                            </div>
                        </div>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $estthmar511;//مصدر الصك (الحفظ) ?></label>
                            <div class="inputWithHintDiv">
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="text"
                                       name="save_place" value="<?php echo $row_Recordset1['save_place']; ?>" size="32">

                            </div>
                        </div>



                        <? if ($type == "shoqa" or $type == "mahal" or $type == "maktab" or $type == "rooms" or $type == "marad") { ?>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar536;//الدور ?></label>
                                <div class="inputWithHintDiv">

                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="aldawr" value="<?php echo $row_Recordset1['aldawr']; ?>" size="32">
                                </div>
                            </div>


                        <? }
                        if ($type == "emara" or $type == "vela" or $type == "borj" or $type == "mojama") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar539;//عدد المصاعد ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="masad_numbers" value="<?php echo $row_Recordset1['masad_numbers']; ?>" size="32">
                                </div>
                            </div>
                        <? } ?>


                        <? if ($type != "ard") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">

                                <label class="filterLabel"><? echo $estthmar537;//رقم عداد الكهرباء ?> 1</label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="raqam_adad_khrba" value="<?php echo $row_Recordset1['raqam_adad_khrba']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"> <? echo $edara_rep_print2024_16 . " " . $estthmar537;//رقم عداد الكهرباء ?>
                                    1</label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="raqam_adad_khrba_percnt" value="<?php echo $row_Recordset1['raqam_adad_khrba_percnt']; ?>"
                                           size="32">
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar537;//رقم عداد الكهرباء ?> 2</label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="raqam_adad_khrba2" value="<?php echo $row_Recordset1['raqam_adad_khrba2']; ?>" size="32">
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"> <? echo $edara_rep_print2024_16 . " " . $estthmar537;//رقم عداد الكهرباء ?>
                                    2</label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="raqam_adad_khrba_percnt2" value="<?php echo $row_Recordset1['raqam_adad_khrba_percnt2']; ?>"
                                           size="32">
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar227;//رقم الحساب ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="adad_shoqa_raqmacc" value="<?php echo $row_Recordset1['adad_shoqa_raqmacc']; ?>" size="32">
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $user_text126;//رقم الاشتراك ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="adad_shoqa_raqmeshterak" value="<?php echo $row_Recordset1['adad_shoqa_raqmeshterak']; ?>"
                                           size="32">
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar538;//رقم عداد الماء ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="raqam_adad_meiah" value="<?php echo $row_Recordset1['raqam_adad_meiah']; ?>" size="32">
                                </div>
                            </div>
                        <? } ?>
                        <? if ($type == "shoqa" or $type == "vela" or $type == "mahal" or $type == "makhzan" or $type == "marad") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar512;//عدد شفاطات الهواء ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="shfatat_number" value="<?php echo $row_Recordset1['shfatat_number']; ?>" size="32">
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar513;//عدد السخانات ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="sakhanat_number" value="<?php echo $row_Recordset1['sakhanat_number']; ?>" size="32">
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $user_text144;// عدد المستخدمين ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' type="text" <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?>
                                           name="shoqa_user_number" value="<?php echo $row_Recordset1['shoqa_user_number']; ?>" size="32">
                                </div>

                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar514;//عدد الأبواب ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="aboab_number" value="<?php echo $row_Recordset1['aboab_number']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar515;//عدد اللمبات ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="lambat_number" value="<?php echo $row_Recordset1['lambat_number']; ?>" size="32">
                                </div>

                            </div>
                        <? } ?>
                        <? if ($type == "shoqa" or $type == "vela" or $type == "mahal" or $type == "makhzan") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar540;//تشطيب المدخل ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="tashteb_madkhal" value="<?php echo $row_Recordset1['tashteb_madkhal']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar541;//تشطيب الواجهه ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="tashteb_wajha" value="<?php echo $row_Recordset1['tashteb_wajha']; ?>" size="32">
                                </div>
                            </div>
                        <? }
                        if ($type == "mojama" or $type == "shaleh" or $type == "borj" or $type == "shoqa" or $type == "vela" or $type == "mahal" or $type == "makhzan" or $type == "emara") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar542;//نوع البناء ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="build_type" value="<?php echo $row_Recordset1['build_type']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar543;//سنة البناء ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="build_year" value="<?php echo $row_Recordset1['build_year']; ?>" size="32">
                                </div>
                            </div>
                        <? } ?>

                        <? if ($type == "shoqa" or $type == "vela" or $type == "mahal" or $type == "makhzan" or $type == "emara") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar544;//تيليفون ?></label>
                                <select class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="tel" id="tel">
                                    <option <?php if ($row_Recordset1['tel'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['tel'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar545;//غاز ?></label>
                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="gass" id="gass">
                                    <option <?php if ($row_Recordset1['gass'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['gass'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar546;//تكييف ?></label>
                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="takeef" id="takeef">
                                    <option <?php if ($row_Recordset1['takeef'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['takeef'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>
                            </div>
                        <? } ?>

                        <? if ($type == "shoqa" or $type == "vela") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar547;//دش ?></label>
                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="dosh" id="dosh">
                                    <option <?php if ($row_Recordset1['dosh'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['dosh'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar548;//انتركم ?><label>
                                        <select <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?> name="entercome" id="entercome">
                                            <option <?php if ($row_Recordset1['entercome'] == "1")
                                                echo "selected"; ?> value="1">
                                                <? echo $estthmar318;//نعم ?></option>
                                            <option <?php if ($row_Recordset1['entercome'] == "0")
                                                echo "selected"; ?> value="0">
                                                <? echo $estthmar371;//لا ?></option>
                                        </select>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar549;//امن ?></label>
                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="amn" id="amn">
                                    <option <?php if ($row_Recordset1['amn'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['amn'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>
                            </div>


                        <? }
                        if ($type == "vela") { ?>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar550;//مسبح ?></label>

                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="masbah" id="masbah">
                                    <option <?php if ($row_Recordset1['masbah'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['masbah'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>


                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar551;//جاكوزي ?></label>

                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="jakozi" id="jakozi">
                                    <option <?php if ($row_Recordset1['jakozi'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['jakozi'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>

                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar552;//ساونا ?></label>

                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="sawna" id="sawna">
                                    <option <?php if ($row_Recordset1['sawna'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['sawna'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>

                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar548;//انتركم ?></label>
                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="intercom" id="intercom">
                                    <option <?php if ($row_Recordset1['intercom'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['intercom'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar553;//حديقة ?></label>
                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="hadeka" id="hadeka">
                                    <option <?php if ($row_Recordset1['hadeka'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['hadeka'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar554;//مكان للرياضة ?> </label>
                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="soprt" id="soprt">
                                    <option <?php if ($row_Recordset1['soprt'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['soprt'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar555;//مكيف ?></label>
                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="mokayef" id="mokayef">
                                    <option <?php if ($row_Recordset1['mokayef'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['mokayef'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar556;//صرف صحي ?> </label>

                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="sarfsehi" id="sarfsehi">
                                    <option <?php if ($row_Recordset1['sarfsehi'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['sarfsehi'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"> <? echo $estthmar557;//غرفة للسائق ?> </label>
                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="sawq_room" id="sawq_room">
                                    <option <?php if ($row_Recordset1['sawq_room'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['sawq_room'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>

                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar558;//غرفة حارس ?> </label>

                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="hares_room" id="hares_room">
                                    <option <?php if ($row_Recordset1['sawq_room'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['sawq_room'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>
                            </div>


                        <? } ?>
                        <? if ($type == "ard" or $type == "mazra" or $type == "vela" or $type == "emara" or $type == "mojama" or $type == "borj" or $type == "emaratejari" or $type == "mojamaskn") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar488;//رقم    القطعة ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="raqam_qeta" value="<?php echo $row_Recordset1['raqam_qeta']; ?>" size="32">
                                </div>
                            </div>

                        <? } ?>
                        <? if ($type == "ard" or $type == "vela" or $type == "mazra" or $type == "emara" or $type == "mojama" or $type == "borj" or $type == "emaratejari" or $type == "mojamaskn") { ?>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar489;//رقم البلوك ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="raqam_block" value="<?php echo $row_Recordset1['raqam_block']; ?>" size="32">
                                </div>
                            </div>
                        <? } ?>
                        <? if ($type == "ard" or $type == "qeta" or $type == "vela" or $type == "mokhatat" or $type == "mazra" or $type == "emara" or $type == "mojama" or $type == "borj" or $type == "emaratejari" or $type == "mojamaskn") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar490;//الحد الشرقي ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="had_east" value="<?php echo $row_Recordset1['had_east']; ?>" size="32">
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar491;//الحد الغربي ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="had_west" value="<?php echo $row_Recordset1['had_west']; ?>" size="32">
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar492;//الحد الشمالي ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="had_north" value="<?php echo $row_Recordset1['had_north']; ?>" size="32">
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar493;//الحد الجنوبي ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="had_south" value="<?php echo $row_Recordset1['had_south']; ?>" size="32">
                                </div>

                            </div>
                        <? } ?>
                        <? if ($type == "ard" or $type == "mazra") { ?>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar494;//وجهة الارض ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="wejh_ard" value="<?php echo $row_Recordset1['wejh_ard']; ?>" size="32">
                                </div>
                            </div>
                        <? } ?>

                        <? if ($type == "ard" or $type == "mazra" or $type == "mahal" or $type == "makhzan" or $type == "mokhatat" or $type == "borj") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar495;//العرض ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="ld_weidth" value="<?php echo $row_Recordset1['ld_weidth']; ?>" size="32">
                                </div>
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar496;//الطول ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="ld_length" value="<?php echo $row_Recordset1['ld_length']; ?>" size="32">
                                </div>
                            </div>
                        <? } ?>
                        <? if ($type == "ard" or $type == "mazra") { ?>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar497;//نوع    الارض ?></label>

                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="ard_type" id="ard_type">
                                    <option <?php if ($row_Recordset1['ard_type'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar498;//سكني ?></option>
                                    <option <?php if ($row_Recordset1['ard_type'] == "2")
                                        echo "selected"; ?> value="2">
                                        <? echo $estthmar499;//تجاري ?></option>
                                    <option <?php if ($row_Recordset1['ard_type'] == "3")
                                        echo "selected"; ?> value="3">
                                        <? echo $estthmar500;//صناعي ?></option>
                                    <option <?php if ($row_Recordset1['ard_type'] == "4")
                                        echo "selected"; ?> value="4">
                                        <? echo $estthmar501;//زراعي ?></option>
                                    <option <?php if ($row_Recordset1['ard_type'] == "5")
                                        echo "selected"; ?> value="5">
                                        <? echo $estthmar502;//غير محدد ?></option>
                                </select>
                            </div>


                        <? } ?>
                        <? if ($type == "ard" or $type == "mazra" or $type == "mokhatat") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar503;//التخصيص ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="takhsos" value="<?php echo $row_Recordset1['takhsos']; ?>" size="32">

                                </div>
                            </div>
                        <? } ?>
                        <? if ($type == "ard" or $type == "mazra" or $type == "mokhatat") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar504;//بها ترخيص ?></label>
                                <select <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="has_tarkhes" id="has_tarkhes">
                                    <option <?php if ($row_Recordset1['has_tarkhes'] == "1")
                                        echo "selected"; ?> value="1">
                                        <? echo $estthmar318;//نعم ?></option>
                                    <option <?php if ($row_Recordset1['has_tarkhes'] == "0")
                                        echo "selected"; ?> value="0">
                                        <? echo $estthmar371;//لا ?></option>
                                </select>


                            </div>


                        <? } ?>
                        <? if ($type == "mahal" or $type == "makhzan") { ?>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar505;//ارتفاع السقف ?></label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="ertifa_saqf_mahal" value="<?php echo $row_Recordset1['ertifa_saqf_mahal']; ?>" size="32">
                                </div>
                            </div>
                        <? } ?>
                        <? if ($type == "emaratejari" or $type == "mojamaskn" or $type == "mojama") { ?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthmar456;//عدد العمائر ?> </label>
                                <div class="inputWithHintDiv">
                                    <input class='filterInput' <? if ($op == "view")
                                        echo "disabled=\"disabled\""; ?> type="text"
                                           name="number_emara_mojama" value="<?php echo $row_Recordset1['number_emara_mojama']; ?>" size="32">

                                </div>

                            </div>
                            <div class="filterContainer">
                                <?php

                                if ($row_Recordset1['post_status'] == "posted") {
                                    echo "<img style=\"CURSOR: pointer\" src=\"img/empty1.gif\" title=\"تاسيس وحات للعمارة بشكل سريع\" alt=\"تاسيس وحات للعمارة بشكل سريع\"  width=\"18\" height=\"18\"onClick='javDESCript:window.open(\"edara/lead_edara_shoqa_add.php?nid=" . ID_hash($row_Recordset1['id'], "enc") . "\",\"\",\"top=50,left=400,width=850,height=500,menubar=no,toolbar=no,scrollbars=yes,resizable=no,status=no\"); return false;'
					  > ";
                                }
                                ?>


                            </div>
                        <? } ?>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right; grid-column: span 2;">




                            <?if ($_SESSION['def_lang'] == "en")
                                $desc = $row_Recordset1['ld_name_en'];
                            else
                                $desc = $row_Recordset1['ld_name'];

                            $lat = $row_Recordset1['ld_latitude'];
                            $lon = $row_Recordset1['ld_longitude'];
                            $point = $row_Recordset1['ld_point']; ?>
                            <label class="filterLabel">

                                <? if ($row_Recordset1['ld_point'] != "") { ?>


                                    <a href="#"
                                       onClick="window.open('../googlemap_add2.php?page=update&lg=<? echo $_SESSION['def_lang']; ?>&k=<? echo $gen_googlemap_key; ?>&page=update&lat=<? echo $row_Recordset1['ld_latitude']; ?>&log=<? echo $row_Recordset1['ld_longitude']; ?>&p=<? echo $row_Recordset1['ld_point']; ?>&t=<? echo $row_Recordset1['ld_mtype']; ?>','','top=40,left=100,width=575,height=600,,status=yes'); return false;">
                                        <? echo $estthmar587;//عدل مكان العقار على خريطة جوجل ?> </a>
                                <? } else { ?>
                                <a href="#"
                                   onClick="window.open('../googlemap_add2.php?lg=<? echo $_SESSION['def_lang']; ?>&k=<? echo $gen_googlemap_key; ?>&page=update_empty','','top=40,left=100,width=575,height=600,,status=yes'); return false;">
                                    <? echo $estthmar587;//عدل مكان العقار على خريطة جوجل ?> </a><? } ?>
                            </label>

                            <div style="display: flex;  gap: 10px;">


                                <div class="inputWithHintDiv">
                                    <input class='filterInput' type="hidden" size="7" name="ld_mtype"
                                           value="<? echo $row_Recordset1['ld_mtype']; ?>" id="ld_mtype" />

                                    <input class='filterInput' type="text" size="30" name="ld_latitude"
                                           value="<? echo $row_Recordset1['ld_latitude']; ?>" id="ld_latitude" />
                                    <span><? echo $latitude_txt;// ?> </span>
                                </div>

                                <div class="inputWithHintDiv">
                                    <input class='filterInput' type="text" size="30" name="ld_longitude"
                                           value="<? echo $row_Recordset1['ld_longitude']; ?>" id="ld_longitude" />
                                    <input class='filterInput' type="hidden" size="7" name="ld_point"
                                           value="<? echo $row_Recordset1['ld_point']; ?>" id="ld_point" />
                                    <span><? echo $longitude_txt;// ?> </span>
                                </div>
                            </div>



                        </div>

                    </div>
                    <div class="filtersGrid">



                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;  grid-column: span 2;">
                            <label class="filterLabel"><? echo $estthmar559;//تفاصيل اخرى للعقار ?></label>
                            <div class="inputWithHintDiv" style="height:auto ;">
                  <textarea name="notes"  style="width:100% ;"<? if ($op == "view")
                      echo "disabled=\"disabled\""; ?> rows="3" class='filterInput'
                            id="notes"><?php echo $row_Recordset1['notes']; ?></textarea>
                            </div>
                        </div>



                        <?php
                        if ($_SERVER['SERVER_NAME'] == "localhost" or $_SERVER['SERVER_NAME'] == "server" or $_SESSION['is_localhost'] == "yes" or $_SERVER['SERVER_NAME'] == "aqari-sa.com" or $_SERVER['SERVER_NAME'] == "www.aqari-sa.com") {
                            ?>
                            <div class="filterContainer">

                                <span class="filterLabel">           <? echo $img_1_txt;//صورة1 ?> </span>

                                <div class="inputWithHintDiv attachInput" >

                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im1FileEvent()">

                                    <? $ld_im1 = $row_Recordset1["ld_im1"];
                                    $ld_im2 = $row_Recordset1["ld_im2"];
                                    $ld_im3 = $row_Recordset1["ld_im3"];
                                    $ld_im4 = $row_Recordset1["ld_im4"];
                                    $ld_im5 = $row_Recordset1["ld_im5"];
                                    $ld_im6 = $row_Recordset1["ld_im6"];
                                    $ld_im7 = $row_Recordset1["ld_im7"];


                                    if ($ld_im1 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../" . GALLERY_MAIN_IMG_DIR . '' . $ld_im1; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im1" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>

                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im1_label">    </label>

                                <input  hidden class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file" name="ld_im1"
                                        id="ld_im1" onChange="get_img_path(event , 'ld_im1_label')">



                            </div>




                            <div class="filterContainer" >
                                <span class="filterLabel">    <? echo $img_2_txt;//صورة2 ?></span>
                                <div class="inputWithHintDiv attachInput" >
                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im2FileEvent()">
                                    <? if ($ld_im2 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../" . GALLERY_MAIN_IMG_DIR . '' . $ld_im2; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im2" type="checkbox" value="1" style="width: 10%;" />


                                            <span class="clear"></span>

                                        </p>


                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im2_label">    </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file"
                                       name="ld_im2" id="ld_im2" hidden onChange="get_img_path(event , 'ld_im2_label')">

                            </div>

                            <div class="filterContainer" >
                                <span class="filterLabel">    <? echo $img_3_txt;//صورة2 ?></span>
                                <div class="inputWithHintDiv attachInput" >
                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im3FileEvent()">
                                    <? if ($ld_im3 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../" . GALLERY_MAIN_IMG_DIR . '' . $ld_im3; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im3" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>


                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im3_label">    </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file"
                                       name="ld_im3" id="ld_im3" hidden onChange="get_img_path(event , 'ld_im3_label')">

                            </div>

                            <div class="filterContainer" >
                                <span class="filterLabel">    <? echo $img_4_txt;//صورة2 ?></span>
                                <div class="inputWithHintDiv attachInput" >
                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im4FileEvent()">
                                    <? if ($ld_im4 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../" . GALLERY_MAIN_IMG_DIR . '' . $ld_im4; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im4" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>


                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im4_label">    </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file"
                                       name="ld_im4" id="ld_im4" hidden onChange="get_img_path(event , 'ld_im4_label')">

                            </div>

                            <div class="filterContainer" >
                                <span class="filterLabel">    <? echo $img_5_txt;//صورة2 ?></span>
                                <div class="inputWithHintDiv attachInput" >
                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im5FileEvent()">
                                    <? if ($ld_im5 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../" . GALLERY_MAIN_IMG_DIR . '' . $ld_im5; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im5" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>


                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im5_label">    </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file"
                                       name="ld_im5" id="ld_im5" hidden onChange="get_img_path(event , 'ld_im5_label')">

                            </div>


                            <div class="filterContainer" >
                                <span class="filterLabel">    <? echo $user_text143;//صورة2 ?></span>
                                <div class="inputWithHintDiv attachInput" >
                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im6FileEvent()">
                                    <? if ($ld_im6 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../" . GALLERY_MAIN_IMG_DIR . '' . $ld_im6; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im6" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>


                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im6_label">    </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file"
                                       name="ld_im6" id="ld_im6" hidden onChange="get_img_path(event , 'ld_im6_label')">

                            </div>

                            <div class="filterContainer" >
                                <span class="filterLabel">    <? echo $edara_rep_print2024_15;//صورة2 ?></span>
                                <div class="inputWithHintDiv attachInput" >
                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im7FileEvent()">
                                    <? if ($ld_im7 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../" . GALLERY_MAIN_IMG_DIR . '' . $ld_im7; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im7" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>


                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im7_label">    </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file"
                                       name="ld_im7" id="ld_im7" hidden onChange="get_img_path(event , 'ld_im7_label')">

                            </div>



                        <?php } else {
                            ?>

                            <div class="filterContainer">

                                <span class="filterLabel">           <? echo $img_1_txt;//صورة1 ?> </span>

                                <div class="inputWithHintDiv attachInput" >

                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im1FileEvent()">

                                    <? $ld_im1 = $row_Recordset1["ld_im1"];
                                    $ld_im2 = $row_Recordset1["ld_im2"];
                                    $ld_im3 = $row_Recordset1["ld_im3"];
                                    $ld_im4 = $row_Recordset1["ld_im4"];
                                    $ld_im5 = $row_Recordset1["ld_im5"];
                                    $ld_im6 = $row_Recordset1["ld_im6"];
                                    $ld_im7 = $row_Recordset1["ld_im7"];


                                    if ($ld_im1 != "") { ?>
                                        <br />
                                        <? echo $estthmar304;// مستخدم ?>: <strong style="color:#F00">user</strong>
                                        <? echo $estthmar386;//كلمة مرور ?> : <strong style="color:#F00">user@user!@ </strong>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../files_data/" . $ld_im1; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im1" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>

                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im1_label">    </label>

                                <input  hidden class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file" name="ld_im1"
                                        id="ld_im1" hidden onChange="get_img_path(event , 'ld_im1_label')">

                            </div>

                            <div class="filterContainer" >
                                <span class="filterLabel">    <? echo $img_2_txt;//صورة2 ?></span>
                                <div class="inputWithHintDiv attachInput" >
                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im2FileEvent()">
                                    <? if ($ld_im2 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../files_data/" . $ld_im2; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im2" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>


                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im2_label">    </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file"
                                       name="ld_im2" id="ld_im2" hidden onChange="get_img_path(event , 'ld_im2_label')">

                            </div>

                            <div class="filterContainer" >
                                <span class="filterLabel">    <? echo $img_3_txt;//صورة2 ?></span>
                                <div class="inputWithHintDiv attachInput" >
                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im3FileEvent()">
                                    <? if ($ld_im3 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../files_data/" . $ld_im3; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im3" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>


                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im3_label">    </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file"
                                       name="ld_im3" id="ld_im3" hidden onChange="get_img_path(event , 'ld_im3_label')">

                            </div>

                            <div class="filterContainer" >
                                <span class="filterLabel">    <? echo $img_4_txt;//صورة2 ?></span>
                                <div class="inputWithHintDiv attachInput" >
                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im4FileEvent()">
                                    <? if ($ld_im4 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../files_data/" . $ld_im4; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im4" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>


                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im4_label">    </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file"
                                       name="ld_im4" id="ld_im4" hidden onChange="get_img_path(event , 'ld_im4_label')">

                            </div>


                            <div class="filterContainer" >
                                <span class="filterLabel">    <? echo $img_5_txt;//صورة2 ?></span>
                                <div class="inputWithHintDiv attachInput" >
                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im5FileEvent()">
                                    <? if ($ld_im5 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../files_data/" . $ld_im5; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im5" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>


                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im5_label">    </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file"
                                       name="ld_im5" id="ld_im5" hidden onChange="get_img_path(event , 'ld_im5_label')">

                            </div>


                            <div class="filterContainer" >
                                <span class="filterLabel">    <? echo $user_text143;//صورة2 ?></span>
                                <div class="inputWithHintDiv attachInput" >
                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im6FileEvent()">
                                    <? if ($ld_im6 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../files_data/" . $ld_im6; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im6" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>


                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im5_label">    </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file"
                                       name="ld_im6" id="ld_im6" hidden onChange="get_img_path(event , 'ld_im6_label')">

                            </div>


                            <div class="filterContainer" >
                                <span class="filterLabel">    <? echo $edara_rep_print2024_15;//صورة2 ?></span>
                                <div class="inputWithHintDiv attachInput" >
                                    <img src="new_theme_style/img/camera.svg" alt="" onClick="ld_im7FileEvent()">
                                    <? if ($ld_im7 != "") { ?>

                                        <p style="font-size:12px ; "><label> </label> <A target="_blank"

                                                                                         href='<? echo "../files_data/" . $ld_im7; ?>'

                                                                                         style="color:#C00; margin-bottom:12px;"><strong>مشاهدة</strong> </A> <br />حذف <input

                                                name="delete_im7" type="checkbox" value="1" style="width: 10%;" />

                                            <span class="clear"></span>

                                        </p>


                                    <? } ?>

                                </div>
                                <label class="path_label" id="ld_im7_label">    </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> type="file"
                                       name="ld_im7" id="ld_im7" hidden onChange="get_img_path(event , 'ld_im7_label')">

                            </div>




                        <? } ?>
                        <?php

                        $hide = "yes";
                        if ($hide == "no") {

                            ?>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label><? echo $estthmar562;//معلومات الاتصال بالمكتب ?> </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label><? echo $estthmar366;//الهاتف ?>
                                </label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="ld_office_tel"
                                       type="text" id="ld_office_tel" value="<?php echo $row_Recordset1['ld_office_tel']; ?>" size="32" />
                            </div>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label><? echo $estthmar563;//الجوال ?></label>
                                <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="ld_office_jawwal"
                                       type="text" id="ld_office_jawwal" value="<?php echo $row_Recordset1['ld_office_jawwal']; ?>"
                                       size="32" />
                            </div>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label><? echo $edara_user_add13_txt;//البريد الالكتروني ?> </label> <input class='filterInput' <? if ($op == "view")
                                    echo "disabled=\"disabled\""; ?> name="ld_office_email" type="text"
                                                                                                            id="ld_office_email" value="<?php echo $row_Recordset1['ld_office_email']; ?>" size="32" />
                            </div>
                            </td>
                            </tr>


                            <tr valign="baseline">
                                <td>&nbsp;</td>
                                <td><strong><? echo $estthmar581;//معلومات الاتصال بصاحب العرض ?></strong></td>
                            </tr>
                            <tr valign="baseline">
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr valign="baseline">
                                <td>
                                    <div align="<? echo $_SESSION['align']; ?>"><span class="ico style4">*
                      </span>&nbsp;<? echo $estthmar565;//الاسم الأول ?> </div>
                                </td>
                                <td>
                                    <div align="<? echo $_SESSION['align']; ?>">
                                        <input class='filterInput' <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?> type="text"
                                               name="ld_u_fname" value="<?php echo $row_Recordset1['ld_u_fname']; ?>" size="32" />
                                    </div>
                                </td>
                            </tr>
                            <tr valign="baseline">
                                <td>
                                    <div align="<? echo $_SESSION['align']; ?>"><span class="ico style4">*
                      </span>&nbsp;<? echo $estthmar566;//الاسم الأخير ?></div>
                                </td>
                                <td>
                                    <div align="<? echo $_SESSION['align']; ?>">
                                        <input class='filterInput' <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?> type="text"
                                               name="ld_u_lastname" value="<?php echo $row_Recordset1['ld_u_lastname']; ?>" size="32" />
                                    </div>
                                </td>
                            </tr>
                            <tr valign="baseline">
                                <td style="HEIGHT: 21px">
                                    <div align="<? echo $_SESSION['align']; ?>"><span class="ico style4">*
                      </span>&nbsp;<? echo $estthmar366;// الهاتف ?> </div>
                                </td>
                                <td>
                                    <div align="<? echo $_SESSION['align']; ?>">
                                        <p> <input class='filterInput' <? if ($op == "view")
                                                echo "disabled=\"disabled\""; ?> type="text"
                                                   name="ld_u_tel" value="<?php echo $row_Recordset1['ld_u_tel']; ?>" size="32" />
                                    </div>
                                </td>
                            </tr>
                            <tr valign="baseline">
                                <td nowrap="nowrap" align="<? echo $_SESSION['align']; ?>">
                                    <div align="<? echo $_SESSION['align']; ?>"><? echo $edara_user_add13_txt;//البريد الالكتروني ?> </div>
                                </td>
                                <td>
                                    <div align="<? echo $_SESSION['align']; ?>">
                                        <input class='filterInput' <? if ($op == "view")
                                            echo "disabled=\"disabled\""; ?> type="text"
                                               name="ld_u_email" value="<?php echo $row_Recordset1['ld_u_email']; ?>" size="32" />
                                    </div>
                                </td>
                            </tr>

                        <? }

                        if ($row_Recordset_permission['mqawl'] == "10") { ?>



                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label><? echo $estthmar561;//اظهر في قسم المشاريع ?></label> <input class='filterInput' type="checkbox"
                                                                                                     name="is_proj" <?php if ($row_Recordset1['is_proj'] == "proj")
                                    echo "checked=\"checked\""; ?> value="proj"
                                                                                                     size="32" />
                            </div>
                        <? } ?>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label><?php echo $edara_rep_print2024_13;//اخفاء من موقع الانترنت ?></label> <input class='filterInput'
                                                                                                                 type="checkbox" name="hidesite" <?php if ($row_Recordset1['hidesite'] == "yes")
                                echo "checked=\"checked\""; ?> value="yes" size="32" />
                        </div>


                        <? if ($show1 == "yes33") { ?>
                            <tr valign="baseline">
                            <td nowrap align="<? echo $_SESSION['align']; ?>"><? echo $estthmar567;//عرض خاص ?></td>
                            <td>
                                <p> <input class='filterInput' type="checkbox" name="show_spicel_offers" <?php if ($row_Recordset1['show_spicel_offers'] == "yes")
                                        echo "checked=\"checked\""; ?> value="yes"
                                           size="32" /></p>
                            </td>
                            </tr><? } ?>      <? if ($_SERVER['SERVER_NAME'] == "www.asscc.net" or $_SERVER['SERVER_NAME'] == "asscc.net") { ?>

                            <tr valign="baseline">
                                <td nowrap align="<? echo $_SESSION['align']; ?>">
                                    <? if ($_SERVER['SERVER_NAME'] == "www.asscc.net" or $_SERVER['SERVER_NAME'] == "asscc.net")
                                        echo $estthmar569;
                                    else { ?>
                                        <? echo $estthmar568;//شقق مفروشة ?>
                                    <? } ?></
                                td>
                                <td>
                                    <p> <input class='filterInput' type="checkbox" name="show_shoqq_mafrosh" <?php if ($row_Recordset1['show_shoqq_mafrosh'] == "yes")
                                            echo "checked=\"checked\""; ?> value="yes"
                                               size="32" /></p>
                                </td>
                            </tr> <? } ?>
                        <tr valign="baseline" style="">
                            <td nowrap align="<? echo $_SESSION['align']; ?>"> </td>
                            <td><label>

                                    <input class='filterInput' type="hidden" name="add_to_net_offer" value="no">
                                </label></td>
                        </tr>
                        <?


                        echo " <input name=\"emp_id\" type=\"hidden\" value=\"" . myint_decrypt($_SESSION['admin_id']) . "\" />";
                        ?>









                    </div>

                    <div class="navigationActions">



                        <div class="formStepBtn previous previous2" onClick="goToBasic()">
                            <img src="new_theme_style/img/previousArrowBlack.svg" alt="">
                            <div class="text">
                                <span class="btnPrev2"><? echo $estthmar807; ?></span>
                                <span class="stepName"> <? echo $edara_user_add_txt; ?></span>
                            </div>
                        </div>
                        <input  id="submit_inp" type="image" src="style/images/form-btn2<? echo $_SESSION['def_lang'];?>.png" style="height:31px; width:150px; float:left" name="submit" value="MM_insert"  onKeyPress="return submitenter(this,event)"   alt="حفظ"/>

                        <div class="formStepBtn next next3" onclick="createBuilding()">

                            <div class="text">
                                <span class="btnNext3"> <? echo $save_txt; ?> </span>
                            </div>
                            <img src="new_theme_style/img/nextArrowWhiteNavButton.svg" alt="">
                        </div>


                    </div>

                </div>




            </div>


    </form>


</div>


<script>
    function ownerTypeChange(event) {
        if (event.target.checked) {
            if (event.target.id == "oneOwner") {
                var anchor1 = document.createElement('a');

                anchor1.href = "main.php?pagemenu=edara&op=<? echo $_GET["op"]; ?>&p=<? echo $_GET['p']; ?>&id=<? echo ID_hash($row_Recordset1['id'], "enc"); ?>&type=allcat&aqd_wehda_type=<?php
                    if ($emaraselected_fromtemp != "")
                        echo "to_one_from_aqd_was_many";
                    else
                        echo "to_one_new"; ?>" ;


                anchor1.target = "frame1";
                anchor1.click();

            } else if (event.target.id == "multiOwner") {
                var anchor = document.createElement('a');
                anchor.href = "main.php?pagemenu=edara&id=<? echo ID_hash($row_Recordset1['id'],"enc");?>&op=<? echo $_GET["op"];?>&p=<? echo $_GET['p'];?>&type=allcat&sendtype=shoqaselectedlist&aqd_wehda_type=one_to_many";
                anchor.target = "frame1";
                anchor.click();
            }
        }
    }

    function goToBasic() {
        let step1stage1 = document.querySelector('.content.createProperty.stage1');  //basic
        let step1stage3 = document.querySelector('.content.createProperty.stage3'); //optional
        let creating = document.querySelector('.content.createProperty.creating'); //tab that shown loading while createing
        let created = document.querySelector('.content.createProperty.created');//tab that shown after  create
        let step1 = document.querySelector('.createStep1'); //create step
        let step2 = document.querySelector('.createStep2'); //units step


        step1stage1.style.display = 'block';
        step1stage3.style.display = 'none';
        if (creating != null) {
            creating.style.display = 'none';
        }
        if (created != null) {
            created.style.display = 'none';
        }
        if (step2 != null) {
            step2.style.display = 'none';
        }



    }



    function goToOptional() {
        let step1stage1 = document.querySelector('.content.createProperty.stage1');  //basic
        let step1stage3 = document.querySelector('.content.createProperty.stage3'); //optional
        let creating = document.querySelector('.content.createProperty.creating'); //tab that shown loading while createing
        let created = document.querySelector('.content.createProperty.created');//tab that shown after  create
        let step1 = document.querySelector('.createStep1'); //create step
        let step2 = document.querySelector('.createStep2'); //units step


        step1stage1.style.display = 'none';
        step1stage3.style.display = 'block';
        if (creating != null) {
            creating.style.display = 'none';
        }
        if (created != null) {
            created.style.display = 'none';

        }
        if (step2 != null) {
            step2.style.display = 'none';

        }

    }

    function createBuilding() {
        $('#submit_inp').trigger('click');
    }

    function ld_im1FileEvent(){

        $('#ld_im1').trigger('click');
    }
    function ld_im2FileEvent(){

        $('#ld_im2').trigger('click');
    }
    function ld_im3FileEvent(){

        $('#ld_im3').trigger('click');
    }
    function ld_im4FileEvent(){

        $('#ld_im4').trigger('click');
    }
    function ld_im5FileEvent(){

        $('#ld_im5').trigger('click');

    }
    function ld_im6FileEvent(){

        $('#ld_im6').trigger('click');
    }
    function ld_im7FileEvent(){

        $('#ld_im7').trigger('click');
    }
    function get_img_path(ev , id){
        // console.log(ev.target.value);
        var path = ev.target.value ;
        document.getElementById(id).innerHTML = path ;

    }

    function showSideSheet(){

        $('#sideSheet').attr('style', 'display: flex !important');
    }
    function  hideSideSheet(){

        $('#sideSheet').attr('style','display: none !important');

        var _count =  $("input.cb_percent").filter(function () {
            return $.trim($(this).val()).length > 0}).length;
        document.getElementById('ownersAdded_count').innerHTML =  'تم إضافة ' + ' ' + _count + 'مالك';


    }

</script>

</body>

</html>
