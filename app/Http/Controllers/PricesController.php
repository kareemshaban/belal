<?php //session_start();
ini_set('max_execution_time', 7200); require_once('../Connections/data.php');


$insertSQL = sprintf("INSERT INTO tbl_temp_files ( temp_id ) VALUES ( %s   )",

    GetSQLValueString(myint_decrypt($_SESSION['edara_office_id']), "int") );
mysql_select_db($database_data);
$Result1 = mysql_query($insertSQL) or die(mysql_error());


$query_Recordset3 = "select max(temp_file_id) as max from tbl_temp_files  where   temp_id=". intval(myint_decrypt($_SESSION['edara_office_id']));


$Recordset3 = mysql_query($query_Recordset3) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);


$maxid= $row_Recordset3['max'];

$_SESSION['sanad_day_count']=$_SESSION['sanad_day_count']+1;

$ref_sanad_id = "";

$_SESSION['sanad_ref_sanad_id']="";

$ref_sanad_id = myint_decrypt($_SESSION['edara_office_id'])."_".myint_decrypt($_SESSION['admin_id'])."_".$maxid."_".$_SESSION['sanad_day_count'].(md5(rand() * time())).uniqid().$_GET['ref_sanad_id'];;
$_SESSION[$ref_sanad_id]= $_SESSION[$ref_sanad_id]+1;
if($_SESSION[$ref_sanad_id]>1)exit;



?>

<?php


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
    $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form16")) {


    include("sanad_general_add_action.php");
}
else{



    ?>
    <?php require_once('../Connections/data.php'); ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="css/all.css" rel="stylesheet" type="text/css" />

        <script>
            $(function() {




                var calendar = $.calendars.instance('ummalqura');

                $('#sanad_date_h').calendarsPicker({calendar: calendar});
                $('#sanad_date_h').val('').calendarsPicker('option',
                    {dateFormat: calendar.ISO_8601});


                $('#sanad_date').calendarsPicker();
                $('#sanad_date').val('').calendarsPicker('option',
                    {dateFormat: calendar.ISO_8601});

                //////////////////////////////////////////////////////////////

                $('#date_h_text1').calendarsPicker({calendar: calendar});
                $('#date_h_text1').val('').calendarsPicker('option',
                    {dateFormat: calendar.ISO_8601});


                $('#date_text1').calendarsPicker();
                $('#date_text1').val('').calendarsPicker('option',
                    {dateFormat: calendar.ISO_8601});

                //////////////////////////////////////////////////////////////

                $('#date_text0_h').calendarsPicker({calendar: calendar});
                $('#date_text0_h').val('').calendarsPicker('option',
                    {dateFormat: calendar.ISO_8601});


                $('#date_text0').calendarsPicker();
                $('#date_text0').calendarsPicker('option',
                    {dateFormat: calendar.ISO_8601});



            });


            function  check_datee(val,f_name){

                if(val!=""){

                    var requester = false;
                    if(window.XMLHttpRequest) {
                        requester = new XMLHttpRequest;
                    } else if (window.ActiveXObject) {
                        requester = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    if(requester) {
                        requester.onreadystatechange = function() {
                            if(requester.readyState == 0 || requester.readyState == 1) {}
                            if(requester.readyState == 4 || requester.readyState == "complete") {

                                if(requester.status == 200 || requester.status == 304) {
                                    document.getElementById(f_name).value = (requester.responseText).trim();
                                    <? if($_GET['type']=='qaid'){?>

                                    if(f_name == "sanad_date" || f_name == "sanad_date_h"){
                                        if(document.getElementById('sanad_date').value !="" )
                                            document.getElementById('date_text0').value=  document.getElementById('sanad_date').value;
                                    }
                                    <? }?>

                                } else {
                                    document.getElementById('data_proft_years2').innerHTML = '<p><? echo $estthmar101;//���� ��� �� ��� ������� ��������?></p>';
                                }
                            }
                        }
                        requester.open("GET", "convert_dates.php?date_type="+f_name+"&date_val="+val, true);
                        requester.send(null);
                    }
                }}
            //]]>

        </script>

        <SCRIPT TYPE="text/javascript">

            $(document).ready(function() {

                $('.popup-youtube').magnificPopup({

                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,

                    fixedContentPos: false
                });

                <? if ($_GET['cat']=='tasded_mostahakat'){?>
                jQuery.magnificPopup.open({
                    items: {
                        src: '<? echo "edara/aqar_cust_select.php?user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=mostajer&sanad_type=qabd&day=tus &form=form1&field=customer_id&masrofat_eradat=".$_GET["masrofat_eradat"]."&field2=customer_name&field3=aqar_id&field4=aqar_name&field5=price&field6=treg_date&field7=treg_date_h&field8=treg_date2&field9=treg_date2_h&field10=sanad_date&field11=sanad_date_h&field12=tnote&field13=taklofanote&field14=as_meiah_kahrabnote&field15=meiah_note&field16=khraba_note&field17=cost_center_name&field18=cost_center_id&field19=ejar_id&field20=tcs&field21=tcs_name&field22=added_vat_note&field23=gazz_note&field24=aqd_qost_added_vat_note&field25=offise_kdmat_note&field26=offise_kdmat_added_vat_note&user_idm=".$row_Recordset222u_edara_office_id["id"]."&periodfrom=".$period_from_trans_date_m."&periodto=".$period_to_trans_date_m."&aqdidd=".$_GET["ejar_idd"].""; ?>'
                    },
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,

                    fixedContentPos: false
                }, 0);
                console.log("opennnn");

                <? } ?>

            });




            //<![CDATA[
            function get_bank_sub(textValue,rowid,customer_id) {
                var requester = false;

                if(window.XMLHttpRequest) {
                    requester = new XMLHttpRequest;
                } else if (window.ActiveXObject) {
                    requester = new ActiveXObject("Microsoft.XMLHTTP");
                }

                if(requester) {
                    requester.onreadystatechange = function() {
                        if(requester.readyState == 0 || requester.readyState == 1) {
                            document.getElementById('content_bank_sub'+rowid).innerHTML = '<span><img src="load/co.gif"></span>';
                        }
                        if(requester.readyState == 4 || requester.readyState == "complete") {
                            if(requester.status == 200 || requester.status == 304) {
                                document.getElementById('content_bank_sub'+rowid).innerHTML = requester.responseText;
                            } else {
                                document.getElementById('content_bank_sub'+rowid).innerHTML = '<p><? echo $estthmar101; //���� ��� �� ��� ������� ��������?></p>';
                            }
                        }
                    }
                    requester.open("GET", "edara/get_bank_sub.php?bank_id=" + textValue+"&rowid=" + rowid+"&customer_id="+customer_id, true);
                    requester.send(null);

                }
            }
            //]]>
            function Enab_qabd_amel_eradat_cbox(sendcopytoeradat,row) {


                safr_malk_id= document.getElementById('qabd_eradat_type'+ row);


                if( sendcopytoeradat=="yes"  || sendcopytoeradat=="yesperiod")
                { safr_malk_id.style.background  = "#fff";
                    safr_malk_id.readOnly = false;
                }
                else { safr_malk_id.style.background  = "#ccc";
                    safr_malk_id.readOnly = true;
                }
            }


            function getSanad_listBox(cust_type,listtype) {

                var requester = false;



                if(window.XMLHttpRequest) {

                    requester = new XMLHttpRequest;

                } else if (window.ActiveXObject) {

                    requester = new ActiveXObject("Microsoft.XMLHTTP");

                }



                if(requester) {

                    requester.onreadystatechange = function() {

                        if(requester.readyState == 0 || requester.readyState == 1) {

                            document.getElementById('content_sanad_listBox').innerHTML = '<span><img src="../load/co.gif"></span>';

                        }

                        if(requester.readyState == 4 || requester.readyState == "complete") {

                            if(requester.status == 200 || requester.status == 304) {

                                document.getElementById('content_sanad_listBox').innerHTML = requester.responseText;

                            } else {

                                document.getElementById('content_sanad_listBox').innerHTML = '<p><? echo $estthmar101; //���� ��� �� ��� ������� ��������?></p>';

                            }

                        }

                    }

                    requester.open("GET", "edara/getSanad_listBox.php?listtype="+listtype+"&cust_type="+cust_type+"&type2="+document.form1.sanad_qabd_sarf_type2.value, true);

                    requester.send(null);



                }

            }

            //]]>




            function getSanad2(textValue,qabd_price_privit_balance,div_price_percent ) {
                document.getElementById("cs_name_text0").value="";
                document.getElementById("cs_text0").value="";

                var requester = false;
                var row=document.form1.total_rows.value;

                if(row=="")row =0;


                document.getElementById("aqar_text0").value=textValue;

                document.getElementById("aqar_name_text0").value=textValue;

                document.getElementById("div_price_percent").value=div_price_percent;



                if(textValue=="qastmstajer")document.getElementById("note_text0").value= document.form1.tnote.value;
                if(textValue=="qabd_div_per_tamien_seianah")document.getElementById("note_text0").value= document.form1.tnote.value;
                if(textValue=="qabd_ejaraqdtaklofa")document.getElementById("note_text0").value= document.form1.taklofanote.value;


                if(textValue=="qabd_ejar_sianah_as_khrb_moi")document.getElementById("note_text0").value= document.form1.as_meiah_kahrabnote.value;
                if(textValue=="qabd_ejar_khraba")document.getElementById("note_text0").value= document.form1.khraba_note.value;
                if(textValue=="qabd_ejar_added_vat")document.getElementById("note_text0").value= document.form1.added_vat_note.value;
                if(textValue=="qabd_ejar_aqd_qost_added_vat")document.getElementById("note_text0").value= document.form1.aqd_qost_added_vat_note.value;
                if(textValue=="qabd_ejar_offise_kdmat_added_vat")document.getElementById("note_text0").value= document.form1.offise_kdmat_added_vat_note.value;

                if(textValue=="qabd_ejar_gazz")document.getElementById("note_text0").value= document.form1.gazz_note.value;
                if(textValue=="qabd_ejar_offise_kdmat")document.getElementById("note_text0").value= document.form1.offise_kdmat_note.value;
                if(textValue=="qabd_ejar_eskan_gov")document.getElementById("note_text0").value= document.form1.eskan_gov_note.value;

                if(textValue=="qabd_ejar_meiah")document.getElementById("note_text0").value= document.form1.meiah_note.value;

                if(textValue=="qastmoshtari")document.getElementById("note_text0").value= document.form1.tnote.value;
                if(textValue=="qabd_sellcashaqdtaklofa")document.getElementById("note_text0").value= document.form1.taklofsellcashanote.value;





                if(textValue=="qastmstajer"){document.getElementById("note_text0").value= document.form1.tnote.value;

                    document.getElementById("reg_date_text0").value=document.form1.treg_date.value;
                    document.getElementById("reg_date2_text0").value=document.form1.treg_date2.value;
                    document.getElementById("reg_date2_h_text0").value=document.form1.treg_date2_h.value;
                    document.getElementById("reg_date_h_text0").value=document.form1.treg_date_h.value;
                    document.getElementById("cs_name_text0").value=document.form1.tcs_name.value;
                    document.getElementById("cs_text0").value=document.form1.tcs.value;

                    if(document.getElementById("cs_nameqastmstajer_text0").value==""){
                        document.getElementById("cs_nameqastmstajer_text0").value=document.form1.tcs_name.value;
                        document.getElementById("csqastmstajer_text0").value=document.form1.tcs.value;

                        document.getElementById("cs_name_text0").value=document.form1.tcs_name.value;
                        document.getElementById("cs_text0").value=document.form1.tcs.value;
                    }
                    else{
                        document.getElementById("cs_name_text0").value= document.getElementById("cs_nameqastmstajer_text0").value;
                        document.getElementById("cs_text0").value= document.getElementById("csqastmstajer_text0").value;
                    }

                }

                if(textValue=="qabd_ejar_offise_kdmat"){

                    <? if($_SESSION['accounting_module']==10 ){  $query_Recordset204cm =  "select * from tbl_e_account     where  acc_type='ejaroffise_kdmat' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;
                    $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                    $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);
                    if($row_Recordset204cm["id1"]!=""){ ?>

                    document.getElementById("cs_name_text0").value='<? echo $row_Recordset204cm["a_name"];?>';
                    document.getElementById("cs_text0").value=<? echo $row_Recordset204cm["id1"];?>;
                    <? }
                    }?>
                }



                if(textValue=="qastmstajer"  || textValue=="qabd_ejar_sianah_as_khrb_moi" || textValue=="qabd_ejar_gazz" ||   textValue=="qabd_ejar_khraba" ||   textValue=="qabd_ejar_added_vat" || textValue=="qabd_ejar_meiah" ){



                    if(   textValue=="qastmstajer" ){
                        <?   if($_SERVER['SERVER_NAME']=="www.sorouh-1.com" or $_SERVER['SERVER_NAME']=="sorouh-1.com" ){?>

                        document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                        document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        <? } ?>


                    }






                    if( textValue=="qabd_ejar_sianah_as_khrb_moi" || textValue=="qabd_ejar_gazz"    ){
                        <? if($_SESSION['accounting_module']==10 ){?>


                        <?   if($_SERVER['SERVER_NAME']=="www.srtq1.com" or $_SERVER['SERVER_NAME']=="srtq1.com" 	or $_SERVER['SERVER_NAME']=="www.srtq3.com" or $_SERVER['SERVER_NAME']=="srtq3.com" or $_SERVER['SERVER_NAME']=="www.srtq4.com" or $_SERVER['SERVER_NAME']=="srtq4.com" ){?>

                        <? if($_SESSION['accounting_module']==10 ){


                        $query_Recordset204cm =  "select * from tbl_e_account     where  acc_type='ejaroffise_kdmat' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;
                        $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                        $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);
                        if($row_Recordset204cm["id1"]!=""){ ?>

                        document.getElementById("cs_name_text0").value='<? echo $row_Recordset204cm["a_name"];?>';
                        document.getElementById("cs_text0").value=<? echo $row_Recordset204cm["id1"];?>;
                        <? }
                        }?>

                        <? }else{



                        $query_Recordset204cm =  "select * from tbl_e_account     where  acc_type='erad_qabd_sianah_as_khrb_moi' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;
                        $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                        $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);
                        if($row_Recordset204cm["id1"]!=""){ ?>

                        if( document.form1.malek_can_manage_aqar.value=='no'){
                            document.getElementById("cs_name_text0").value='<? echo $row_Recordset204cm["a_name"];?>';
                            document.getElementById("cs_text0").value=<? echo $row_Recordset204cm["id1"];?>;
                        }else{

                            document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                            document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        }


                        <? } else{

                        ?>

                        if( document.form1.malek_can_manage_aqar.value=='no'){
                            document.getElementById("cs_name_text0").value=document.form1.tcs_name.value;
                            document.getElementById("cs_text0").value=document.form1.tcs.value;
                        }else{

                            document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                            document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        }
                        <? }
                        }
                        } else{?>

                        document.getElementById("cs_name_text0").value='<? echo $estthmar200;//������?>';
                        document.getElementById("cs_text0").value='yesmalk';
                        <? }?>
                    }





                    if(   textValue=="qabd_ejar_meiah" ){
                        <?   if($_SERVER['SERVER_NAME']=="www.alardalsalba.com" or $_SERVER['SERVER_NAME']=="alardalsalba.com" ){?>


                        document.getElementById("cs_name_text0").value='����� ���� ���� ';
                        document.getElementById("cs_text0").value=-3244;
                        <? } else if($_SESSION['accounting_module']==10 ){



                        $query_Recordset204cm =  "select * from tbl_e_account     where  acc_type='erad_qabd_ejar_meiah' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;
                        $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                        $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);
                        if($row_Recordset204cm["id1"]!=""){ ?>

                        if( document.form1.malek_can_manage_aqar.value=='no'){
                            document.getElementById("cs_name_text0").value='<? echo $row_Recordset204cm["a_name"];?>';
                            document.getElementById("cs_text0").value=<? echo $row_Recordset204cm["id1"];?>;
                        }else{

                            document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                            document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        }

                        <? } else{  ?>

                        if( document.form1.malek_can_manage_aqar.value=='no'){
                            document.getElementById("cs_name_text0").value=document.form1.tcs_name.value;
                            document.getElementById("cs_text0").value=document.form1.tcs.value;
                        }else{

                            document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                            document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        }



                        <? }

                        } else{?>

                        document.getElementById("cs_name_text0").value='<? echo $estthmar200;//������?>';
                        document.getElementById("cs_text0").value='yesmalk';
                        <? }?>
                    }

                    if(   textValue=="qabd_ejar_khraba" ){
                        <? if(myint_decrypt($_SESSION['edara_office_id'])==6 ){?>


                        document.getElementById("cs_name_text0").value='����� ������� ������ ����� �����  ';
                        document.getElementById("cs_text0").value=-3188;
                        <? } else {?>

                        <? if($_SESSION['accounting_module']==10 ){

                        $query_Recordset204cm = "SELECT * FROM tbl_general  where gen_id=1" ;
                        $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                        $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);

                        ?>

                        <? if($_SESSION['accounting_module2']==10 and $row_Recordset204cm["kahraba_estehqaq"]=="yes");else{



                        $query_Recordset204cm =  "select * from tbl_e_account     where  acc_type='erad_qabd_ejar_khraba' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;
                        $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                        $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);
                        if($row_Recordset204cm["id1"]!=""){ ?>

                        if( document.form1.malek_can_manage_aqar.value=='no'){
                            document.getElementById("cs_name_text0").value='<? echo $row_Recordset204cm["a_name"];?>';
                            document.getElementById("cs_text0").value=<? echo $row_Recordset204cm["id1"];?>;
                        }else{

                            document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                            document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        }
                        <? } else{  ?>


                        if( document.form1.malek_can_manage_aqar.value=='no'){
                            document.getElementById("cs_name_text0").value=document.form1.tcs_name.value;
                            document.getElementById("cs_text0").value=document.form1.tcs.value;
                        }else{

                            document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                            document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        }
                        <? }}} else{?>

                        document.getElementById("cs_name_text0").value='<? echo $estthmar200;//������?>';
                        document.getElementById("cs_text0").value='yesmalk';
                        <? }?>


                        <? }?>

                    }


                    var div_price_percent_value=div_price_percent;

                    document.getElementById("temp_display_only_pdiv_price_percent_text0").value=   div_price_percent_value   ;


                    if(div_price_percent_value<0){ div_price_percent_value=-1* div_price_percent_value;

                        <?
                        if( $_SERVER['SERVER_NAME']=="www.aalmosa.net" or $_SERVER['SERVER_NAME']=="aalmosa.net")  ;else{?>
                        document.getElementById("div_price_percent_text0").value=  "%"+  div_price_percent_value   ;
                        <? } ?>

                    }
                    else
                        document.getElementById("div_price_percent_text0").value=  div_price_percent_value   ;
                }

                document.getElementById("credit_text0").value=qabd_price_privit_balance;
                add_row();


                var rr;
                rr= parseInt(document.form1.total_rows.value) ;

                document.form1.total_rows.value=rr;



            }

            function ejaza_cost(days_ejaza) {
                document.getElementById("credit_text1").value= Math.round  ( parseFloat (document.form1.last_rateb.value)/30*parseFloat (days_ejaza)) ;
            }



            function Enab_ejar_period_cbox(row) {

                frm=document.forms['form1']
                if(document.getElementById("cbox_ejar_period_text"+row).checked)
                {

                    document.getElementById("reg_date_text"+row).style.background  = "#ccc";
                    document.getElementById("reg_date_text"+row).readOnly = true;

                    document.getElementById("reg_date2_text"+row).style.background  = "#ccc";
                    document.getElementById("reg_date2_text"+row).readOnly = true;


                    document.getElementById("reg_date_h_text"+row).style.background  = "#ccc";
                    document.getElementById("reg_date_h_text"+row).readOnly = true;

                    document.getElementById("reg_date2_h_text"+row).style.background  = "#ccc";
                    document.getElementById("reg_date2_h_text"+row).readOnly = true;


                }
                else { document.getElementById("reg_date_text"+row).style.background  = "#fff";
                    document.getElementById("reg_date_text"+row).readOnly = false;

                    document.getElementById("reg_date2_text"+row).style.background  = "#fff";
                    document.getElementById("reg_date2_text"+row).readOnly = false;


                    document.getElementById("reg_date_h_text"+row).style.background  = "#fff";
                    document.getElementById("reg_date_h_text"+row).readOnly = false;

                    document.getElementById("reg_date2_h_text"+row).style.background  = "#fff";
                    document.getElementById("reg_date2_h_text"+row).readOnly = false;

                }
            }




            function getSanad3(textValue,qabd_price_privit_balance,div_price_percent ) {

                var requester = false;
                var row=document.form1.total_rows.value;

                if(row=="")row =0;


                document.getElementById("aqar_text0").value=textValue;
                document.getElementById("aqar_name_text0").value=textValue;

                document.getElementById("div_price_percent").value=div_price_percent;



                if(textValue=="qastmstajer")document.getElementById("note_text0").value= document.form1.tnote.value;
                if(textValue=="qabd_div_per_tamien_seianah")document.getElementById("note_text0").value= document.form1.tnote.value;
                if(textValue=="qabd_ejaraqdtaklofa")document.getElementById("note_text0").value= document.form1.taklofanote.value;


                if(textValue=="qabd_ejar_sianah_as_khrb_moi")document.getElementById("note_text0").value= document.form1.as_meiah_kahrabnote.value;
                if(textValue=="qabd_ejar_aqd_qost_added_vat")document.getElementById("note_text0").value= document.form1.aqd_qost_added_vat_note.value;
                if(textValue=="qabd_ejar_offise_kdmat_added_vat")document.getElementById("note_text0").value= document.form1.offise_kdmat_added_vat_note.value;

                if(textValue=="qabd_ejar_added_vat")document.getElementById("note_text0").value= document.form1.added_vat_note.value;
                if(textValue=="qabd_ejar_gazz")document.getElementById("note_text0").value= document.form1.gazz_note.value;
                if(textValue=="qabd_ejar_offise_kdmat")document.getElementById("note_text0").value= document.form1.offise_kdmat_note.value;

                if(textValue=="qabd_ejar_eskan_gov")document.getElementById("note_text0").value= document.form1.eskan_gov_note.value;
                if(textValue=="qabd_ejar_khraba")document.getElementById("note_text0").value= document.form1.khraba_note.value;
                if(textValue=="qabd_ejar_meiah")document.getElementById("note_text0").value= document.form1.meiah_note.value;
                <? if($_GET["seianah_ticket_id"]!=""){?>
                if(textValue=="seianah")document.getElementById("note_text0").value= document.form1.seianah_ticket_idnote.value;
                <? }?>

                <? if(  $_GET["cat"]=="ejaza"){
                $ejazaid=  secure( "str",ID_hash($_GET["id"],"dec")) ;

                $query_Recordset1_malkaqar = "select * from tbl_hr_rateb where post_status='posted' and  id=$ejazaid order by id ASC   ";
                $Recordset1_malkaqar = mysql_query($query_Recordset1_malkaqar) or die(mysql_error());
                $row_Recordset1_malkaqar = mysql_fetch_assoc($Recordset1_malkaqar);
                $totalRows_Recordset1_malkaqar = mysql_num_rows($Recordset1_malkaqar);
                $ejaza_notes=$row_Recordset1_malkaqar['notes'];

                ?>
                if(textValue=="sanad_sarf_ejaza")document.getElementById("note_text0").value='<? echo $ejaza_notes;?>';
                <? }?>
                <? if($_GET["cat"]=="rateb" or  $_GET["cat"]=="ejaza"){
                ?>
                if(textValue=="sanad_sarf_rateb")document.getElementById("note_text0").value= document.form1.rateb_id.value;
                <? }?>
                <? if($_GET["cat"]=="purchase"  ){ ?>
                if(textValue=="sanad_sarf_taccount")document.getElementById("note_text0").value="����� ������ �������";
                <? }?>
                <? if($_GET["cat"]=="purchase_sell"  ){ ?>
                if(textValue=="sanad_sarf_taccount")document.getElementById("note_text0").value="����� ������ ������";
                document.form1.note_main.value="����� ������ ������";
                <? }?>

                <?
                ////////////////// start sadad fatorah khadmat /////////////////
                if($_GET["cat"]=="purchase_khedma" ){
                $khedmaid=  secure( "str",ID_hash($_GET["id"],"dec")) ;

                $query_Recordset9999999 = "SELECT * FROM tbl_khedmat    where id=". intval($khedmaid);
                $Recordset9999999 = mysql_query($query_Recordset9999999) or die(mysql_error());
                $row_Recordset9999999 = mysql_fetch_assoc($Recordset9999999);

                $query_Recordset9999999 = "SELECT * FROM tbl_inv_item_temp    where  ref_item_id_invoice='".$row_Recordset9999999['khedma_ref']."' ";
                $Recordset9999999 = mysql_query($query_Recordset9999999) or die(mysql_error());
                $row_Recordset9999999 = mysql_fetch_assoc($Recordset9999999);


                ?>
                document.getElementById("note_text0").value="<? echo  $row_Recordset9999999['name'];?>";
                document.form1.note_main.value="<? echo  $row_Recordset9999999['name'];?>";

                document.getElementById("row_table_cust_id").innerHTML="";

                <? }
                ////////////////// end sadad fatorah khadmat /////////////////
                ?>
                document.getElementById("credit_text0").value=qabd_price_privit_balance;
                document.getElementById("reg_date_text0").value=document.form1.treg_date.value;
                document.getElementById("reg_date2_text0").value=document.form1.treg_date2.value;
                document.getElementById("reg_date2_h_text0").value=document.form1.treg_date2_h.value;
                document.getElementById("reg_date_h_text0").value=document.form1.treg_date_h.value;

                <? if($_SESSION['accounting_module2']==10 );else{?>
                document.getElementById("cs_name_text0").value=document.form1.tcs_name.value;
                document.getElementById("cs_text0").value=document.form1.tcs.value;
                <? }?>


                if(   textValue=="qastmstajer" ){
                    <?   if($_SERVER['SERVER_NAME']=="www.sorouh-1.com" or $_SERVER['SERVER_NAME']=="sorouh-1.com" ){?>

                    document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                    document.getElementById("cs_text0").value=document.form1.malk_id.value;

                    <? } ?>


                }
                var div_price_percent_value=div_price_percent;

                document.getElementById("temp_display_only_pdiv_price_percent_text0").value=   div_price_percent_value   ;


                if(div_price_percent_value<0){ div_price_percent_value=-1* div_price_percent_value;

                    <?  if( $_SERVER['SERVER_NAME']=="www.aalmosa.net" or $_SERVER['SERVER_NAME']=="aalmosa.net")  ;else{?>

                    document.getElementById("div_price_percent_text0").value=  "%"+  div_price_percent_value   ;
                    <? } ?>
                }
                else
                    document.getElementById("div_price_percent_text0").value=  div_price_percent_value   ;
                add_row();




                var rr;
                rr= parseInt(document.form1.total_rows.value)+ 1;

                document.form1.total_rows.value=rr;



            }




            function formControl(submitted)
            {
                if(submitted=="1")
                {
                    document.getElementById("submit1").style.visibility = "hidden";

                }
            }







            function getSanad_qaid(textValue,price2) {
                if(textValue!=""){

                    var row=document.form1.total_rows.value;


                    var row_qaid_debit=document.form1.need_row_debit.value;


                    var row_qaid_credit=document.form1.need_row_credit.value;

                    var row_qaid_credit_statr=parseInt(row_qaid_debit);

                    var row_qaid_credit_last=row_qaid_credit_statr+parseInt(row_qaid_credit);


                    for (i = 0; i <row_qaid_debit ; i++) {


                        getSanad5('from_acc',0,i);

                    } for (is = row_qaid_credit_statr; is <row_qaid_credit_last ; is++) {


                        getSanad5('to_acc',0,is);

                    }

                }

            }

            function getSanad5(textValue,price2,row) {
                if(textValue!=""  ){

                    document.getElementById("add").style.visibility = "hidden";


                    var requester = false;
                    var row=document.form1.total_rows.value;

                    if(row=="")row =0;


                    if(window.XMLHttpRequest) {

                        requester = new XMLHttpRequest;

                    } else if (window.ActiveXObject) {

                        requester = new ActiveXObject("Microsoft.XMLHTTP");

                    }



                    if(requester) {

                        requester.onreadystatechange = function() {

                            if(requester.readyState == 0 || requester.readyState == 1) {

                                document.getElementById('content_sanad_'+ row).innerHTML = '<span><img src="../load/co.gif"></span>';

                            }

                            if(requester.readyState == 4 || requester.readyState == "complete") {

                                if(requester.status == 200 || requester.status == 304) {

                                    document.getElementById('content_sanad_'+ row).innerHTML = requester.responseText;
                                    window.parent.setIframeHeight2('frame1');

                                    document.getElementById("add").style.visibility = "visible";


                                } else {

                                    document.getElementById('content_sanad_'+ row).innerHTML = '<p>���� ��� �� ��� ������� ��������</p>';

                                }

                            }

                        }
                        if(price2==0)
                            requester.open("GET", "edara/getSanad.php?type=" + textValue+"&price=0&qaid_row="+row+"&price=0&reg_date="+ document.form1.treg_date.value+"&cs="+ document.form1.tcs.value+"&cs_name="+ document.form1.tcs_name.value+"&reg_date_h="+ document.form1.treg_date_h.value+"&reg_date2="+ document.form1.treg_date2.value+"&reg_date2_h="+ document.form1.treg_date2_h.value+"&note="+ document.form1.tnote.value+"&taklofanote="+ document.form1.taklofanote.value+"&as_meiah_kahrabnote="+ document.form1.as_meiah_kahrabnote.value+"&aqd_qost_added_vat_note="+ document.form1.aqd_qost_added_vat_note.value+"&added_vat_note="+ document.form1.added_vat_note.value+"&gazz_note="+ document.form1.gazz_note.value+"&eskan_gov_note="+ document.form1.eskan_gov_note.value+"&offise_kdmat_note="+ document.form1.offise_kdmat_note.value+"&khraba_note="+ document.form1.khraba_note.value+"&meiah_note="+"&customer_id="+ document.form1.customer_id.value+ document.form1.meiah_note.value+"&aqar_id="+ document.form1.aqar_id.value+"&sendcopytoeradat="+ document.form1.tsendcopytoeradat.value, true);
                        else
                            requester.open("GET", "edara/getSanad.php?type=" + textValue+"&price="+ document.form1.price.value+"&cs="+ document.form1.tcs.value+"&cs_name="+ document.form1.tcs_name.value+"&reg_date="+ document.form1.treg_date.value+"&reg_date_h="+ document.form1.treg_date_h.value+"&reg_date2="+ document.form1.treg_date2.value+"&reg_date2_h="+ document.form1.treg_date2_h.value+"&aqar_id="+ document.form1.aqar_id.value+"&taklofanote="+ document.form1.taklofanote.value+"&as_meiah_kahrabnote="+ document.form1.as_meiah_kahrabnote.value+"&aqd_qost_added_vat_note="+ document.form1.aqd_qost_added_vat_note.value+"&added_vat_note="+ document.form1.added_vat_note.value+"&gazz_note="+ document.form1.gazz_note.value+"&eskan_gov_note="+ document.form1.eskan_gov_note.value+"&offise_kdmat_note="+ document.form1.offise_kdmat_note.value+"&khraba_note="+ document.form1.khraba_note.value+"&customer_id="+ document.form1.customer_id.value+"&meiah_note="+ document.form1.meiah_note.value+"&note="+ document.form1.tnote.value+"&sendcopytoeradat="+ document.form1.tsendcopytoeradat.value, true);



                        requester.send(null);

                        rr= parseInt(document.form1.total_rows.value)+ 1;

                        document.form1.total_rows.value=rr;

                        window.parent.setIframeHeight2('frame1');





                    }


                }
            }







            function getSanad(textValue,price2) {
                var requester = false;
                var row=document.form1.total_rows.value;


                if(row=="")row =0;



                document.getElementById("aqar_text0").value=textValue;
                document.getElementById("aqar_name_text0").value=textValue;





                if(textValue=="qabd_div_per_tamien_seianah")document.getElementById("note_text0").value= document.form1.tnote.value;
                if(textValue=="qabd_ejaraqdtaklofa")document.getElementById("note_text0").value= document.form1.taklofanote.value;


                if(textValue=="qabd_ejar_sianah_as_khrb_moi")document.getElementById("note_text0").value= document.form1.as_meiah_kahrabnote.value;


                if(textValue=="qabd_ejar_added_vat")document.getElementById("note_text0").value= document.form1.added_vat_note.value;
                if(textValue=="qabd_ejar_aqd_qost_added_vat")document.getElementById("note_text0").value= document.form1.aqd_qost_added_vat_note.value;
                if(textValue=="qabd_ejar_offise_kdmat_added_vat")document.getElementById("note_text0").value= document.form1.offise_kdmat_added_vat_note.value;


                if(textValue=="qabd_ejar_offise_kdmat")document.getElementById("note_text0").value= document.form1.offise_kdmat_note.value;
                if(textValue=="qabd_ejar_eskan_gov")document.getElementById("note_text0").value= document.form1.eskan_gov_note.value;

                if(textValue=="qabd_ejar_gazz")document.getElementById("note_text0").value= document.form1.gazz_note.value;
                if(textValue=="qabd_ejar_khraba")document.getElementById("note_text0").value= document.form1.khraba_note.value;
                if(textValue=="qabd_ejar_meiah")document.getElementById("note_text0").value= document.form1.meiah_note.value;
                if(textValue=="sanad_sarf_malk")document.getElementById("note_text0").value= document.form1.tnote.value;





                if(textValue=="qastmstajer"){document.getElementById("note_text0").value= document.form1.tnote.value;

                    document.getElementById("reg_date_text0").value=document.form1.treg_date.value;
                    document.getElementById("reg_date2_text0").value=document.form1.treg_date2.value;
                    document.getElementById("reg_date2_h_text0").value=document.form1.treg_date2_h.value;
                    document.getElementById("reg_date_h_text0").value=document.form1.treg_date_h.value;


                    if(document.getElementById("cs_nameqastmstajer_text0").value==""){
                        document.getElementById("cs_nameqastmstajer_text0").value=document.form1.tcs_name.value;
                        document.getElementById("csqastmstajer_text0").value=document.form1.tcs.value;

                        document.getElementById("cs_name_text0").value=document.form1.tcs_name.value;
                        document.getElementById("cs_text0").value=document.form1.tcs.value;
                    }
                    else{
                        document.getElementById("cs_name_text0").value= document.getElementById("cs_nameqastmstajer_text0").value;
                        document.getElementById("cs_text0").value= document.getElementById("csqastmstajer_text0").value;
                    }



                }
                if(textValue=="qabd_ejar_offise_kdmat"){

                    <? if($_SESSION['accounting_module']==10 ){  $query_Recordset204cm =  "select * from tbl_e_account     where  acc_type='ejaroffise_kdmat' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;
                    $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                    $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);
                    if($row_Recordset204cm["id1"]!=""){ ?>

                    document.getElementById("cs_name_text0").value='<? echo $row_Recordset204cm["a_name"];?>';
                    document.getElementById("cs_text0").value=<? echo $row_Recordset204cm["id1"];?>;
                    <? }
                    }?>
                }

                if(textValue=="qastmstajer"  || textValue=="qabd_ejar_sianah_as_khrb_moi" || textValue=="qabd_ejar_gazz"  ||   textValue=="qabd_ejar_khraba" || textValue=="qabd_ejar_meiah" ){


                    if(   textValue=="qastmstajer" ){
                        <?   if($_SERVER['SERVER_NAME']=="www.sorouh-1.com" or $_SERVER['SERVER_NAME']=="sorouh-1.com" ){?>

                        document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                        document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        <? } ?>


                    }


                    if( textValue=="qabd_ejar_sianah_as_khrb_moi" || textValue=="qabd_ejar_gazz"    ){
                        <? if($_SESSION['accounting_module']==10 ){?>


                        <?   if($_SERVER['SERVER_NAME']=="www.srtq1.com" or $_SERVER['SERVER_NAME']=="srtq1.com" 	or $_SERVER['SERVER_NAME']=="www.srtq3.com" or $_SERVER['SERVER_NAME']=="srtq3.com" or $_SERVER['SERVER_NAME']=="www.srtq4.com" or $_SERVER['SERVER_NAME']=="srtq4.com" ){?>

                        <? if($_SESSION['accounting_module']==10 ){


                        $query_Recordset204cm =  "select * from tbl_e_account     where  acc_type='ejaroffise_kdmat' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;
                        $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                        $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);
                        if($row_Recordset204cm["id1"]!=""){ ?>

                        document.getElementById("cs_name_text0").value='<? echo $row_Recordset204cm["a_name"];?>';
                        document.getElementById("cs_text0").value=<? echo $row_Recordset204cm["id1"];?>;
                        <? }
                        }?>

                        <? }else{



                        $query_Recordset204cm =  "select * from tbl_e_account     where  acc_type='erad_qabd_sianah_as_khrb_moi' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;
                        $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                        $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);
                        if($row_Recordset204cm["id1"]!=""){ ?>

                        if( document.form1.malek_can_manage_aqar.value=='no'){
                            document.getElementById("cs_name_text0").value='<? echo $row_Recordset204cm["a_name"];?>';
                            document.getElementById("cs_text0").value=<? echo $row_Recordset204cm["id1"];?>;
                        }else{

                            document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                            document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        }


                        <? } else{

                        ?>

                        document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                        document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        <? }
                        }
                        } else{?>

                        document.getElementById("cs_name_text0").value='<? echo $estthmar200;//������?>';
                        document.getElementById("cs_text0").value='yesmalk';
                        <? }?>
                    }





                    if(   textValue=="qabd_ejar_meiah" ){
                        <?   if($_SERVER['SERVER_NAME']=="www.alardalsalba.com" or $_SERVER['SERVER_NAME']=="alardalsalba.com" ){?>


                        document.getElementById("cs_name_text0").value='����� ���� ���� ';
                        document.getElementById("cs_text0").value=-3244;
                        <? } else if($_SESSION['accounting_module']==10 ){



                        $query_Recordset204cm =  "select * from tbl_e_account     where  acc_type='erad_qabd_ejar_meiah' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;
                        $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                        $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);
                        if($row_Recordset204cm["id1"]!=""){ ?>

                        if( document.form1.malek_can_manage_aqar.value=='no'){
                            document.getElementById("cs_name_text0").value='<? echo $row_Recordset204cm["a_name"];?>';
                            document.getElementById("cs_text0").value=<? echo $row_Recordset204cm["id1"];?>;
                        }else{

                            document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                            document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        }

                        <? } else{  ?>
                        document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                        document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        <? }

                        } else{?>

                        document.getElementById("cs_name_text0").value='<? echo $estthmar200;//������?>';
                        document.getElementById("cs_text0").value='yesmalk';
                        <? }?>
                    }

                    if(   textValue=="qabd_ejar_khraba" ){
                        <? if(myint_decrypt($_SESSION['edara_office_id'])==6 ){?>


                        document.getElementById("cs_name_text0").value='����� ������� ������ ����� �����  ';
                        document.getElementById("cs_text0").value=-3188;
                        <? } else {?>

                        <? if($_SESSION['accounting_module']==10 ){

                        $query_Recordset204cm = "SELECT * FROM tbl_general  where gen_id=1" ;
                        $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                        $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);

                        ?>

                        <? if($_SESSION['accounting_module2']==10 and $row_Recordset204cm["kahraba_estehqaq"]=="yes");else{



                        $query_Recordset204cm =  "select * from tbl_e_account     where  acc_type='erad_qabd_ejar_khraba' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;
                        $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                        $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);
                        if($row_Recordset204cm["id1"]!=""){ ?>

                        if( document.form1.malek_can_manage_aqar.value=='no'){
                            document.getElementById("cs_name_text0").value='<? echo $row_Recordset204cm["a_name"];?>';
                            document.getElementById("cs_text0").value=<? echo $row_Recordset204cm["id1"];?>;
                        }else{

                            document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                            document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        }
                        <? } else{  ?>



                        document.getElementById("cs_name_text0").value=document.form1.malk_name.value;
                        document.getElementById("cs_text0").value=document.form1.malk_id.value;
                        <? }}} else{?>

                        document.getElementById("cs_name_text0").value='<? echo $estthmar200;//������?>';
                        document.getElementById("cs_text0").value='yesmalk';
                        <? }?>


                        <? }?>
                    }

                    var div_price_percent_value=document.form1.div_price_percent.value;

                    document.getElementById("temp_display_only_pdiv_price_percent_text0").value=   div_price_percent_value   ;


                    if(div_price_percent_value<0){ div_price_percent_value=-1* div_price_percent_value;


                        <? if( $_SERVER['SERVER_NAME']=="www.aalmosa.net" or $_SERVER['SERVER_NAME']=="aalmosa.net")  ;else{?>


                        document.getElementById("div_price_percent_text0").value=  "%"+  div_price_percent_value   ;
                        <? } ?>
                    }
                    else
                        document.getElementById("div_price_percent_text0").value=  div_price_percent_value   ;
                }
                if( textValue=='seianah_r' || textValue=='seianah_malk' || textValue=='seianah_mktb' || textValue=='seianah'  || textValue=='sanad_sarf_taccount'  || textValue=='masrofat'  || textValue=='sanad_qabd_amel'  || textValue=='sanad_qabd_dev_percent'
                ){


                    if(document.getElementById("sanad_date").value>'2020-06-30'){var added_vat_div_price_percent_value=<?

                        if($_SESSION['gen_added_vat']>0){

                            $_gen_added_vat2=$_SESSION['gen_added_vat'];

                        }

                        else $_gen_added_vat2=0;


                        echo intval($_gen_added_vat2 );?>;

                    }
                    else { var added_vat_div_price_percent_value=5; }





                    added_vat_div_price_percent_value= added_vat_div_price_percent_value;
                    document.getElementById("added_vat_div_price_percent_text0").value=  "%"+  added_vat_div_price_percent_value   ;


                }


                if( textValue=='sanad_qabd_amel' ){
                    <?



                        $query_Recordset204cm = "SELECT * FROM tbl_e_account  where acc_type='erad_qabd_am' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']);
                        $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                        $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);
                        if($row_Recordset204cm["aparent"]!=""  ){ ?>;


                    document.getElementById("cs_name_text0").value='<? echo $row_Recordset204cm["a_name"];?>';
                    document.getElementById("cs_text0").value='<? echo $row_Recordset204cm["id1"];?>';
                    <? }?>
                }
                if(textValue=="sanad_sarf_malk"){

                    document.getElementById("credit_text0").value= document.getElementById("price").value;





                }else
                    document.getElementById("credit_text0").value=0;

                add_row();




                var rr;
                rr= parseInt(document.form1.total_rows.value) ;

                document.form1.total_rows.value=rr;






            }




            function delSanad(textValue,remove,sanad_item_id) {


                var requester = false;



                if(window.XMLHttpRequest) {

                    requester = new XMLHttpRequest;

                } else if (window.ActiveXObject) {

                    requester = new ActiveXObject("Microsoft.XMLHTTP");

                }



                if(requester) {

                    requester.onreadystatechange = function() {

                        if(requester.readyState == 0 || requester.readyState == 1) {

                            document.getElementById('content_sanad_'+ textValue).innerHTML = '<span><img src="load/co.gif"></span>';

                        }

                        if(requester.readyState == 4 || requester.readyState == "complete") {

                            if(requester.status == 200 || requester.status == 304) {

                                document.getElementById('content_sanad_'+ textValue).innerHTML = requester.responseText;
                                cal_debit_credit();
                            } else {

                                document.getElementById('content_sanad_'+ textValue).innerHTML = '<p><? echo $estthmar101; //���� ��� �� ��� ������� ��������?></p>';

                            }

                        }

                    }

                    requester.open("GET", "edara/getSanad.php?type=" + textValue+"&remove="+remove+"&sanad_item_id="+sanad_item_id, true);

                    requester.send(null);


                    getHai(-1);

                }

            }
            //]]>



            //<![CDATA[
            function set_sanad_regdate(textValue,rowid) {

                var requester = false;

                if(window.XMLHttpRequest) {
                    requester = new XMLHttpRequest;
                } else if (window.ActiveXObject) {
                    requester = new ActiveXObject("Microsoft.XMLHTTP");
                }

                if(requester) {
                    requester.onreadystatechange = function() {
                        if(requester.readyState == 0 || requester.readyState == 1) {
                            document.getElementById('content_fn').innerHTML = '<span><img src="load/co.gif"></span>';
                        }
                        if(requester.readyState == 4 || requester.readyState == "complete") {
                            if(requester.status == 200 || requester.status == 304) {
                                document.getElementById('reg_date2_h_text'+rowid).value =requester.responseText;
                                set_sanad_regdate3(requester.responseText,rowid);
                            } else {
                                document.getElementById('content_fn').innerHTML = '<p><? echo $estthmar101; //���� ��� �� ��� ������� ��������?></p>';
                            }
                        }
                    }

                    requester.open("GET", "edara/get_sanad_regdate.php?pricenew=" + textValue+"&rowid="+rowid+"&price="+document.form1.price.value+"&reg_date="+document.form1.treg_date.value+"&reg_date_h="+document.form1.treg_date_h.value+"&reg_date2="+document.form1.treg_date2.value+"&reg_date2_h="+document.form1.treg_date2_h.value+"&aqar_id="+document.form1.aqar_id.value+"&customer_id="+document.form1.customer_id.value, true);
                    requester.send(null);


                }


            }







            function set_sanad_regdate3(textValue,rowid)  {
                var requester2 = false;

                if(window.XMLHttpRequest) {
                    requester2 = new XMLHttpRequest;
                } else if (window.ActiveXObject) {
                    requester2 = new ActiveXObject("Microsoft.XMLHTTP");
                }

                if(requester2) {
                    requester2.onreadystatechange = function() {
                        if(requester2.readyState == 0 || requester2.readyState == 1) {
                            document.getElementById('content_fnc').innerHTML = '<span><img src="load/co.gif"></span>';
                        }
                        if(requester2.readyState == 4 || requester2.readyState == "complete") {
                            if(requester2.status == 200 || requester2.status == 304) {
                                document.getElementById('reg_date2_text'+rowid).value=requester2.responseText;

                            } else {
                                document.getElementById('content_fnc').innerHTML = '<p><? echo $estthmar101; //���� ��� �� ��� ������� ��������?></p>';
                            }
                        }
                    }

                    requester2.open("GET", "edara/set_meladi_date.php?reg_date2_h="+textValue, true);
                    requester2.send(null);

                }


            }
            //<![CDATA[
            function setField(textValue,rowid) {
                var requester = false;

                if(window.XMLHttpRequest) {
                    requester = new XMLHttpRequest;
                } else if (window.ActiveXObject) {
                    requester = new ActiveXObject("Microsoft.XMLHTTP");
                }

                if(requester) {
                    requester.onreadystatechange = function() {
                        if(requester.readyState == 0 || requester.readyState == 1) {
                            document.getElementById('content_f'+ rowid).innerHTML = '<span><img src="load/co.gif"></span>';
                        }
                        if(requester.readyState == 4 || requester.readyState == "complete") {
                            if(requester.status == 200 || requester.status == 304) {
                                document.getElementById('content_f'+ rowid).innerHTML = requester.responseText;
                            } else {
                                document.getElementById('content_f'+ rowid).innerHTML = '<p><? echo $estthmar101; //���� ��� �� ��� ������� ��������?></p>';
                            }
                        }
                    }

                    requester.open("GET", "edara/get_chek.php?f=" + textValue+"&rowid="+rowid+"&typedata="+document.form1.typedata.value+"&cust_type="+document.form1.temp_cust_type.value+"&aqar_id="+document.form1.aqar_id.value+"&customer_id="+document.form1.customer_id.value, true);
                    requester.send(null);


                }
            }


            //<![CDATA[
            function set_eradat_period(textValue,rowid,price,reg_date,reg_date2,reg_date_h,reg_date2_h) {
                var requester = false;

                if(window.XMLHttpRequest) {
                    requester = new XMLHttpRequest;
                } else if (window.ActiveXObject) {
                    requester = new ActiveXObject("Microsoft.XMLHTTP");
                }

                if(requester) {
                    requester.onreadystatechange = function() {
                        if(requester.readyState == 0 || requester.readyState == 1) {
                            document.getElementById('content_eradat_period'+ rowid).innerHTML = '<span><img src="load/co.gif"></span>';
                        }
                        if(requester.readyState == 4 || requester.readyState == "complete") {
                            if(requester.status == 200 || requester.status == 304) {
                                document.getElementById('content_eradat_period'+ rowid).innerHTML = requester.responseText;
                            } else {
                                document.getElementById('content_eradat_period'+ rowid).innerHTML = '<p><? echo $estthmar101; //���� ��� �� ��� ������� ��������?></p>';
                            }
                        }
                    }

                    requester.open("GET", "edara/get_eradat_period.php?f=" + textValue+"&rowid="+rowid+"&typedata="+document.form1.typedata.value+"&cust_type="+document.form1.temp_cust_type.value+"&aqar_id="+document.form1.aqar_id.value+"&customer_id="+document.form1.customer_id.value+"&price="+document.getElementById('price'+ rowid).value+"&reg_date="+reg_date+"&reg_date2="+reg_date2+"&reg_date_h="+reg_date_h+"&reg_date2_h="+reg_date2_h, true);
                    requester.send(null);

                    Enab_qabd_amel_eradat_cbox(textValue,  rowid);
                }
            }
            //]]>


            //<![CDATA[
            function get_eradat_period(textValue,rowid,price,reg_date,reg_date2,reg_date_h,reg_date2_h) {

                var x_cbox_tawsse_period ;
                if(document.getElementById("cbox_tawsse_period_text"+rowid).checked==true)x_cbox_tawsse_period='yes';
                else x_cbox_tawsse_period='no';


                var requester = false;

                if(window.XMLHttpRequest) {
                    requester = new XMLHttpRequest;
                } else if (window.ActiveXObject) {
                    requester = new ActiveXObject("Microsoft.XMLHTTP");
                }

                if(requester) {
                    requester.onreadystatechange = function() {
                        if(requester.readyState == 0 || requester.readyState == 1) {
                            document.getElementById('content_eradat_period').innerHTML = '<span><img src="load/co.gif"></span>';
                        }
                        if(requester.readyState == 4 || requester.readyState == "complete") {
                            if(requester.status == 200 || requester.status == 304) {
                                document.getElementById('content_eradat_period').innerHTML = requester.responseText;
                            } else {
                                document.getElementById('content_eradat_period').innerHTML = '<p><? echo $estthmar101; //���� ��� �� ��� ������� ��������?></p>';
                            }
                        }
                    }

                    requester.open("GET", "edara/get_eradat_period.php?f=" + x_cbox_tawsse_period+"&rowid="+rowid+"&aqar_id="+document.form1.aqar_id.value+"&customer_id="+document.form1.customer_id.value+"&price="+price+"&reg_date="+reg_date+"&reg_date2="+reg_date2+"&reg_date_h="+reg_date_h+"&reg_date2_h="+reg_date2_h, true);
                    requester.send(null);

                    Enab_qabd_amel_eradat_cbox(textValue,  rowid);
                }
            }



            //<![CDATA[
            function get_solfa_aqsat(rowid,textValue) {
                var requester = false;

                if(window.XMLHttpRequest) {
                    requester = new XMLHttpRequest;
                } else if (window.ActiveXObject) {
                    requester = new ActiveXObject("Microsoft.XMLHTTP");
                }

                if(requester) {
                    requester.onreadystatechange = function() {
                        if(requester.readyState == 0 || requester.readyState == 1) {
                            document.getElementById('content_solfa_aqsat'+ rowid).innerHTML = '<span><img src="load/co.gif"></span>';
                        }
                        if(requester.readyState == 4 || requester.readyState == "complete") {
                            if(requester.status == 200 || requester.status == 304) {
                                document.getElementById('content_solfa_aqsat'+ rowid).innerHTML = requester.responseText;
                            } else {
                                document.getElementById('content_solfa_aqsat'+ rowid).innerHTML = '<p><? echo $estthmar101; //���� ��� �� ��� ������� ��������?></p>';
                            }
                        }
                    }

                    requester.open("GET", "edara/get_solfa_aqsat.php?rowid="+rowid+"&sanad_items_period_ref="+textValue+"&price="+document.getElementById('price'+ rowid).value+"&qast_numbers="+document.getElementById('qast_numbers'+ rowid).value, true);
                    requester.send(null);

                }
            }
            function toggle_it(itemID){
                // Toggle visibility between none and inline


                if ( itemID  == "chek")
                {

                    document.getElementById("pr1").style.display = 'inline';

                }
                else  if ( itemID  == "transfer")
                {
                    document.getElementById("pr1").style.display = 'inline';

                }
                else  if ( itemID  == "shabaka")
                {
                    document.getElementById("pr1").style.display = 'inline';

                }

                else {
                    document.getElementById("pr1").style.display = 'none';

                }
            }

            function validateForm()
            {



                var x=document.forms["form1"]["chek_date"].value;
                if (x==null || x=="" || x==0)
                {
                    alert("<? echo $estthr89;//���� ����� ������� ����� �� �������?>");
                    return false;
                }

                var x=document.forms["form1"]["chek_no"].value;
                if (x==null || x=="" || x==0)
                {
                    alert("<? echo $estthr90;//���� ��� ����� �� �������?>");
                    return false;
                }

                var x=document.forms["form1"]["debit_acc"].value;
                if (x==null || x=="" || x==0)
                {
                    alert("<? echo $estthr91;//���� ������ �� �����?>");
                    return false;
                }


            }


            function cbChange(obj) {


                var ckboxselected;
                if(  obj.checked==false)ckboxselected=obj.name;
                var cbs = document.getElementsByClassName("cb");
                for (var i = 0; i < cbs.length; i++) {
                    cbs[i].checked = false;

                }
                obj.checked = true;
                cbs[ckboxselected].checked = false;



            }


            //<![CDATA[

            function get_repeat_sanad(textValue) {

                var requester = false;



                if(window.XMLHttpRequest) {

                    requester = new XMLHttpRequest;

                } else if (window.ActiveXObject) {

                    requester = new ActiveXObject("Microsoft.XMLHTTP");

                }



                if(requester) {

                    requester.onreadystatechange = function() {

                        if(requester.readyState == 0 || requester.readyState == 1) {
                            document.getElementById('data_repeat_sanad').style.display = 'flex';
                            document.getElementById('data_repeat_sanad').innerHTML = '<span><img src="load/co.gif"></span>';

                        }

                        if(requester.readyState == 4 || requester.readyState == "complete") {

                            if(requester.status == 200 || requester.status == 304) {

                                document.getElementById('data_repeat_sanad').style.display = 'flex';
                                document.getElementById('data_repeat_sanad').innerHTML = requester.responseText;
                                console.log(requester.responseText);
                                if(requester.responseText == "")
                                    document.getElementById('data_repeat_sanad').style.display = 'none';

                            } else {
                                document.getElementById('data_repeat_sanad').style.display = 'flex';
                                document.getElementById('data_repeat_sanad').innerHTML = '<p><? echo $estthmar1536 ;//���?></p>';

                            }

                        }

                    }

                    requester.open("GET", "edara/get_repeat_sanad.php?type=" + textValue, true);

                    requester.send(null);



                }

            }

            //]]>
        </SCRIPT>
        <? include('layouts/inner_pages_head.php') ?>
        <style>
            @media (min-width: 768px) {
                .two_span {
                    grid-column: span 2 ;

                }
            }

        </style>
    </head>


    <body>
    <?php mysql_select_db($database_data );



    if($_GET["ejazalistsanadsarf"]=="yes"){
        $rateb_total_amount_debit=0;$ejazaid=  secure( "str",ID_hash($_GET["id"],"dec")) ;

        $rr="select * from tbl_hr_rateb where post_status='posted' and  id=$ejazaid order by id ASC   ";

        $resultsite = mysql_query($rr);
        if (!$resultsite) {    die("Query to show fields from table failed moshtari popup");}

        $rowstotal_rateb_to_sarf = mysql_num_rows($resultsite);

        if($rowstotal_rateb_to_sarf==0){echo $estthr92;exit(0);}

        else{

            $rowstotal_rateb_to_sarf_notes= $estthr93;

            for($jt=1;$jt<=$rowstotal_rateb_to_sarf;$jt++)
            {

                $rowsite = mysql_fetch_array($resultsite);
                $ejaza_notes=$rowsite["notes"];

                $query_Recordset1_malkaqar = "SELECT * FROM tbl_e_account    where acc_type='emp_rateb_mostahq'   and a_active='yes'  and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;


                $Recordset1_malkaqar = mysql_query($query_Recordset1_malkaqar) or die(mysql_error());
                $row_Recordset1_malkaqar = mysql_fetch_assoc($Recordset1_malkaqar);
                $totalRows_Recordset1_malkaqar = mysql_num_rows($Recordset1_malkaqar);
                $aparent=$row_Recordset1_malkaqar['aparent'];





                if(myint_decrypt($_SESSION['edara_office_id'])>0  and $row_Recordset1_malkaqar["id1"]!=""){

                    $sanad_item_id = myint_decrypt($_SESSION['edara_office_id'])."_".$jt."_".(md5(rand() * time()));
                    if($_GET['cs']>0)$aqar_id=$_GET['cs'];
                    else $aqar_id=-11;

                    $rateb_total_amount_debit=$rateb_total_amount_debit+$rowsite["total_amount"];
                    if($rowsite["total_amount"]>0)   $insertSQL =   "INSERT INTO  tbl_sanad_items (rateb_id,trans_date,system_user_id,row_qaid_count,amount,sanad_item_id,post_status,sanad_qaid_temp_table_ref,main_acc,sanad_type,u_edara_office_id,  notes,customer_id,debit, cost_center_id   ) VALUES ('".$rowsite["rateb_id"]."','".$rowsite["from_date"]."','".$_POST['user_show_on_screen']."','".$jt."','".$rowsite["total_amount"]."' ,'".$sanad_item_id."','posted','". $ref_sanad_id."','$aparent','from_acc',".myint_decrypt($_SESSION['edara_office_id']).",'��� ���� ".$rowsite["from_date"]." - ".$rowsite["to_date"]."','".$row_Recordset1_malkaqar["id1"]."','".$rowsite["total_amount"]."' ,'".$_GET['cs']."' )"   ;


                    $Result1 = mysql_query($insertSQL) or die(mysql_error());

                }


            }}




    }





    if($_GET["rateblistsanadsarf"]=="yes"){
        $rateb_total_amount_debit=0;
        $rr="select * from tbl_hr_rateb where post_status='posted'  and rateb_item_id>0 order by id ASC   ";

        $resultsite = mysql_query($rr);
        if (!$resultsite) {    die("Query to show fields from table failed moshtari popup");}

        $rowstotal_rateb_to_sarf = mysql_num_rows($resultsite);

        if($rowstotal_rateb_to_sarf==0){echo $estthr92;exit(0);}

        else{

            $rowstotal_rateb_to_sarf_notes= $estthr93;

            for($jt=1;$jt<=$rowstotal_rateb_to_sarf;$jt++)
            {

                $rowsite = mysql_fetch_array($resultsite);


                //	   $query_Recordset1_malkaqar = "SELECT * FROM tbl_e_account    where acc_type='emp_rateb_mostahq'   and a_active='yes'  and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;

                $query_Recordset1_malkaqar = "SELECT * FROM tbl_e_account    where id1=".$rowsite["customer_id"]."   and a_active='yes'  and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;


                $Recordset1_malkaqar = mysql_query($query_Recordset1_malkaqar) or die(mysql_error());
                $row_Recordset1_malkaqar = mysql_fetch_assoc($Recordset1_malkaqar);
                $totalRows_Recordset1_malkaqar = mysql_num_rows($Recordset1_malkaqar);
                $aparent=$row_Recordset1_malkaqar['aparent'];





                if(myint_decrypt($_SESSION['edara_office_id'])>0  and $row_Recordset1_malkaqar["id1"]!=""){

                    $sanad_item_id = myint_decrypt($_SESSION['edara_office_id'])."_".$jt."_".(md5(rand() * time()));
                    if($_GET['cs']>0)$aqar_id=$_GET['cs'];
                    else $aqar_id=-11;

                    $rateb_total_amount_debit=$rateb_total_amount_debit+$rowsite["total_amount"];
                    if($rowsite["total_amount"]>0)   $insertSQL =   "INSERT INTO  tbl_sanad_items (rateb_id,trans_date,system_user_id,row_qaid_count,amount,sanad_item_id,post_status,sanad_qaid_temp_table_ref,main_acc,sanad_type,u_edara_office_id,  notes,customer_id,debit, cost_center_id   ) VALUES ('".$rowsite["rateb_id"]."','".$rowsite["from_date"]."','".$_POST['user_show_on_screen']."','".$jt."','".$rowsite["total_amount"]."' ,'".$sanad_item_id."','posted','". $ref_sanad_id."','$aparent','from_acc',".myint_decrypt($_SESSION['edara_office_id']).",'��� ���� ".$rowsite["from_date"]." - ".$rowsite["to_date"]."','".$row_Recordset1_malkaqar["id1"]."','".$rowsite["total_amount"]."' ,'".$_GET['cs']."' )"   ;


                    $Result1 = mysql_query($insertSQL) or die(mysql_error());

                }


            }}




    }


    ////////////////////////////////


    if($_GET["purchaselistsanadsarf"]=="yes"){


        $rateb_total_amount_debit=0;
        $rr="select id as  id, total as total_amount ,sup_id as sup_id  from tbl_inv_purchase_invoice where id=".$id. $sql_u_edara;
        $resultsite = mysql_query($rr);
        if (!$resultsite) {    die("Query to show fields from table failed moshtari popup");}

        $rowstotal_rateb_to_sarf = mysql_num_rows($resultsite);

        if($rowstotal_rateb_to_sarf==0){echo $estthr92;exit(0);}

        else{

            $rowstotal_rateb_to_sarf_notes= $estthr93;

            for($jt=1;$jt<=$rowstotal_rateb_to_sarf;$jt++)
            {

                $rowsite = mysql_fetch_array($resultsite);


                //	   $query_Recordset1_malkaqar = "SELECT * FROM tbl_e_account    where acc_type='emp_rateb_mostahq'   and a_active='yes'  and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;

                $query_Recordset1_malkaqar = "SELECT * FROM tbl_e_account    where id1=".$rowsite["sup_id"]."   and a_active='yes'  and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;


                $Recordset1_malkaqar = mysql_query($query_Recordset1_malkaqar) or die(mysql_error());
                $row_Recordset1_malkaqar = mysql_fetch_assoc($Recordset1_malkaqar);
                $totalRows_Recordset1_malkaqar = mysql_num_rows($Recordset1_malkaqar);
                $aparent=$row_Recordset1_malkaqar['aparent'];





                if(myint_decrypt($_SESSION['edara_office_id'])>0  and $row_Recordset1_malkaqar["id1"]!=""){

                    $sanad_item_id = myint_decrypt($_SESSION['edara_office_id'])."_".$jt."_".(md5(rand() * time()));
                    if($_GET['cs']>0)$aqar_id=$_GET['cs'];
                    else $aqar_id=-11;

                    $rateb_total_amount_debit=$rateb_total_amount_debit+$rowsite["total_amount"];
                    if($rowsite["total_amount"]>0)   $insertSQL =   "INSERT INTO  tbl_sanad_items (inv_id,trans_date,system_user_id,row_qaid_count,amount,sanad_item_id,post_status,sanad_qaid_temp_table_ref,main_acc,sanad_type,u_edara_office_id,  notes,customer_id,debit, cost_center_id   ) VALUES ('".$rowsite["id"]."','".$rowsite["from_date"]."','".$_POST['user_show_on_screen']."','".$jt."','".$rowsite["total_amount"]."' ,'".$sanad_item_id."','posted','". $ref_sanad_id."','$aparent','from_acc',".myint_decrypt($_SESSION['edara_office_id']).",'��� ���� ".$rowsite["from_date"]." - ".$rowsite["to_date"]."','".$row_Recordset1_malkaqar["id1"]."','".$rowsite["total_amount"]."' ,'".$_GET['cs']."' )"   ;


                    $Result1 = mysql_query($insertSQL) or die(mysql_error());

                }


            }}




    }


    ////////////////////////////////




    if($_GET["shorakalistsanadsarf"]=="yes"){

        $shoraka_total_amount_debit=0;
        $shoraka_total_amount_credit=0;

        $shoraka_total_amount_credit=abs($_GET["total"]);
        $shoraka_total_amount_debit=abs($_GET["total"]);

        $aqar_id=ID_hash($_GET["id"],"dec");

        if( $aqar_id>0){
            $query_Recordset2co = "SELECT * FROM tbl_lead_edara where  id='".intval( $aqar_id)."'";
            $Recordset2co = mysql_query($query_Recordset2co, $data) or die(mysql_error());
            $row_Recordset2co = mysql_fetch_assoc($Recordset2co);
            $ld_name=$row_Recordset2co['ld_name'];}




///////
        $query_Recordset54dd7t="select * from tbl_ejar_temp_shoqa_aqd where temp_type='edara'  and  malk_id>0 and aqar_id=   " .$aqar_id;


        $Recordset54dd7t= mysql_query($query_Recordset54dd7t, $data) or die(mysql_error());
        $row_Recordset54dd7t = mysql_fetch_assoc($Recordset54dd7t);


        if($row_Recordset54dd7t['percent']!=""){



            $result2_22t = mysql_query($query_Recordset54dd7t);
            $nrows7t = mysql_num_rows($result2_22t);
            if($nrows7t != 0)
            {

                for($jet=0;$jet<=$nrows7t ;$jet++)
                {

                    $row_Recordset11t = mysql_fetch_array($result2_22t);
                    $malk_percent_id=$row_Recordset11t['malk_id'];
                    $malk_percent=$row_Recordset11t['percent'];
                    if($malk_percent>0){
                        $query_Recordset2x = "SELECT * FROM tbl_customer where id=".$malk_percent_id;

                        $Recordset2x = mysql_query($query_Recordset2x, $data) or die(mysql_error());
                        $row_Recordset2x = mysql_fetch_assoc($Recordset2x);
                        $malk_added_vat_number=$row_Recordset2x['added_vat_number'];
                        if($malk_added_vat_number=="") $malk_percent_total_has_novat_tobediv= $malk_percent_total_has_novat_tobediv+ $malk_percent;

                    }
                }

            }

        }

        $malk_percent_total_rem=100-$malk_percent_total_has_novat_tobediv;

////



        $rr="select * from tbl_ejar_temp_shoqa_aqd where temp_type='edara'  and  malk_id>0 and aqar_id=   " .$aqar_id;

        $resultsite = mysql_query($rr);
        if (!$resultsite) {    die("Query to show fields from table failed moshtari popup");}

        $rowstotal_rateb_to_sarf = mysql_num_rows($resultsite);

        if($rowstotal_rateb_to_sarf==0){echo $estthr83;exit(0);}

        else{
            $kjo=-1;
            $kjo2=0;
            $rowstotal_rateb_to_sarf_notes= $estthr82;

            for($jt=2;$jt<=$rowstotal_rateb_to_sarf+1;$jt++)
            {

                $rowsite = mysql_fetch_array($resultsite);






                if($jt==2){
                    $mydate=date("Y")."-".date("m")."-".date("d");

                    $rateb_total_amount=$_GET["total"] ;
                    $shoraka_total_amount_dc=$shoraka_total_amount*($rowsite["percent"]/100);
                    if($_GET["vat"]=="yes")
                        $query_Recordset1_malkaqar = "SELECT * FROM tbl_e_account  where  acc_type='added_vat_malk' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;

                    else{
                        $query_Recordset1_malkaqar = "SELECT * FROM tbl_e_account  where  id1=".ID_hash( $_GET["custid"],"dec")." and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;



                        $Recordset1_malkaqar = mysql_query($query_Recordset1_malkaqar) or die(mysql_error());
                        $row_Recordset1_malkaqar = mysql_fetch_assoc($Recordset1_malkaqar);
                        $totalRows_Recordset1_malkaqar = mysql_num_rows($Recordset1_malkaqar);
                        $aparent=$row_Recordset1_malkaqar['aparent'];


                        if(abs($_GET["total"]) >0)  {



                            if( $_GET["total"]<0){ $shoraka_total_amount_debit=abs($_GET["total"]);
                                $shoraka_total_amount_credit=abs($_GET["total"]); $credit=abs($_GET["total"]);$debit=0;$mysanad_type="to_acc";}
                            if( $_GET["total"]>0){ $shoraka_total_amount_debit=abs($_GET["total"]);
                                $shoraka_total_amount_credit=abs($_GET["total"]);$debit=abs($_GET["total"]);$credit=0;$mysanad_type="from_acc";}


                            $insertSQL =   "INSERT INTO  tbl_sanad_items ( aqar_id, trans_date,system_user_id,row_qaid_count,amount,sanad_item_id,

post_status,sanad_qaid_temp_table_ref,main_acc,sanad_type,u_edara_office_id,
  notes,customer_id,debit,credit, cost_center_id

    ) VALUES ('$aqar_id',

   '".$mydate."','".$_POST['user_show_on_screen']."','1','".abs($_GET["total"]) ."'   ,'".$sanad_item_id."','posted','". $ref_sanad_id."','$aparent','$mysanad_type',".myint_decrypt($_SESSION['edara_office_id']).",'����� ����".$row_Recordset1_malkaqar["a_name"]."','".$row_Recordset1_malkaqar["id1"]."','".$debit."' , '".$credit."' ,'".$_GET['cs']."' )"   ;


                            $Result1 = mysql_query($insertSQL) or die(mysql_error());
                        }
                    }

                }
                if($_GET["vat"]=="yes"){





                    $query_Recordset2  = "SELECT * FROM tbl_customer where id =".intval($rowsite["malk_id"]);

                    $Recordset2 = mysql_query($query_Recordset2) or die("E1122=".mysql_error());
                    $row_Recordset2 = mysql_fetch_assoc($Recordset2);

                    $query_Recordset23  = "SELECT * FROM tbl_customer where id =".intval(ID_hash( $_GET["custid"],"dec"));

                    $Recordset23 = mysql_query($query_Recordset23) or die("E1122=".mysql_error());
                    $row_Recordset23 = mysql_fetch_assoc($Recordset23);



                    $query_Recordset1_malkaqar = "SELECT * FROM tbl_e_account  where   acc_type='added_vat_malk' and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;
                }
                else  $query_Recordset1_malkaqar = "SELECT * FROM tbl_e_account  where  id1=".intval($rowsite["malk_id"])." and  u_edara_office_id=" .myint_decrypt($_SESSION['edara_office_id']) ;



                $Recordset1_malkaqar = mysql_query($query_Recordset1_malkaqar) or die(mysql_error());
                $row_Recordset1_malkaqar = mysql_fetch_assoc($Recordset1_malkaqar);
                $totalRows_Recordset1_malkaqar = mysql_num_rows($Recordset1_malkaqar);
                $aparent=$row_Recordset1_malkaqar['aparent'];





                if(myint_decrypt($_SESSION['edara_office_id'])>0  and $row_Recordset1_malkaqar["id1"]!=""){

                    $sanad_item_id = myint_decrypt($_SESSION['edara_office_id'])."_".$jt."_".(md5(rand() * time()));
                    $shoraka_total_amount=$_GET["total"] ;
                    $shoraka_total_amount_dc=$shoraka_total_amount*($rowsite["percent"]/100);

                    $debit=0;$credit=0;

                    if( $shoraka_total_amount_dc>0){$credit=abs($shoraka_total_amount_dc);$debit=0;$mysanad_type="to_acc";}
                    if( $shoraka_total_amount_dc<0){$debit=abs($shoraka_total_amount_dc);$credit=0;$mysanad_type="from_acc";}


                    $mydate=date("Y")."-".date("m")."-".date("d");

                    if($_GET["vat"]=="yes"){






                        if($malk_percent_total_rem>0)
                            $malk_percent=$rowsite['percent']+(($rowsite['percent']/ $malk_percent_total_rem)*$malk_percent_total_has_novat_tobediv );
                        else $malk_percent=$rowsite['percent'];



                        $shoraka_total_amount_dc=$shoraka_total_amount*($malk_percent/100);

                        $debit=0;$credit=0;

                        if( $shoraka_total_amount_dc>0){$credit=abs($shoraka_total_amount_dc);$debit=0;$mysanad_type="to_acc";}
                        if( $shoraka_total_amount_dc<0){$debit=abs($shoraka_total_amount_dc);$credit=0;$mysanad_type="from_acc";}





                        $malk_percent_id=$rowsite['malk_id'];

                        $query_Recordset24 = "SELECT * FROM tbl_customer where id=".intval($malk_percent_id);

                        $Recordset24 = mysql_query($query_Recordset24) or die(mysql_error());
                        $row_Recordset24 = mysql_fetch_assoc($Recordset24);
                        if($row_Recordset24['added_vat_number']!=""){


                            $kjo=$kjo+2;
                            $kjo2=$kjo2+2;

                            $_vat_100_or_105=100;
                            $Result1 = mysql_query($insertSQL) or die(mysql_error());


                            $price_vat= ($debit )  ;



                            $type_trans_inv_type="sarf_added_vat";

                            $inv_type="masrofat";


                            $price_vat_credit1 ="";
                            $price_vat_debit1=$price_vat;


                            $price_vat_credit2 =$price_vat;
                            $price_vat_debit2="";

                            $price_vat_credit2_inv ="";
                            $price_vat_debit2_inv=$price_vat;

                            $total_added_vat_percent_inv=  ((($debit  * $_vat_100_or_105/abs($_SESSION['gen_added_vat'] ))+$debit));

                            $maout_vat= ( $debit  * $_vat_100_or_105/abs($_SESSION['gen_added_vat'] ));

                            $insertSQL4 = sprintf("INSERT INTO tbl_invoice_items_draft ( cbox_added_vat_number,main_addition_acc,cost_center_main_acc,cost_center_id,inv_type,row_qaid_count,total_plus_vat,inv_foren_officeid_uid_sanadid,amount,acc_type,inv_type2,notes,credit,debit,period,aqd_id,customer_id,aqar_id,post_status, trans_date ,u_edara_office_id,system_user_id) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s, %s,%s, %s,%s, %s,%s,  %s,%s, %s,%s,%s)",

                                GetSQLValueString($row_Recordset23['id'], "text"),


                                GetSQLValueString( "vat_taswiat" , "text"),

                                GetSQLValueString($aparent_cost , "text"),

                                GetSQLValueString($_GET["cs"], "int"),

                                GetSQLValueString("sanad", "text"),
                                GetSQLValueString($kjo, "int"),

                                GetSQLValueString($total_added_vat_percent_inv, "double"),

                                GetSQLValueString($ref_sanad_id."_".$kjo  , "text"),
                                GetSQLValueString($maout_vat, "double"),
                                GetSQLValueString("qaid2", "text"),
                                GetSQLValueString($inv_type, "text"),
                                GetSQLValueString("����� ���� ���� ������ ( ".$malk_percent."%)".$row_Recordset1_malkaqar["a_name"]." - ".$ld_name." ".$row_Recordset2["name_search"], "text"),
                                GetSQLValueString($price_vat_credit2_inv, "double"),
                                GetSQLValueString($price_vat_debit2_inv, "double"),
                                GetSQLValueString($pay_type, "int"),
                                GetSQLValueString($sanad_id, "int"),
                                GetSQLValueString($row_Recordset1_malkaqar["id1"], "int"),
                                GetSQLValueString($aqar_id2, "int"),
                                GetSQLValueString("posted", "text"),
                                GetSQLValueString($mydate  , "text"),
                                GetSQLValueString(myint_decrypt($_SESSION['edara_office_id']), "int"),
                                GetSQLValueString(myint_decrypt($_SESSION['admin_id']), "int") );
                            $Result1 = mysql_query($insertSQL4) or die(mysql_error());



                            /////credit


                            $inv_type="eradat";
                            $type_trans_inv_type="qabd_added_vat";
                            $_POST_price_row=$debit;
                            $price_vat= ($_POST_price_row )  ;

                            $price_vat_credit1 =$price_vat;
                            $price_vat_debit1="";

                            $price_vat_credit2 ="";
                            $price_vat_debit2=$price_vat;



                            $price_vat_credit2_inv =$price_vat;
                            $price_vat_debit2_inv="";


                            $total_added_vat_percent_inv=  ((($debit  * $_vat_100_or_105/abs($_SESSION['gen_added_vat'] ))+$debit));

                            $maout_vat= ( $debit  * $_vat_100_or_105/abs($_SESSION['gen_added_vat'] ));

                            $insertSQL5 = sprintf("INSERT INTO tbl_invoice_items  ( cbox_added_vat_number,main_addition_acc,cost_center_main_acc,cost_center_id,inv_type,row_qaid_count,total_plus_vat,inv_foren_officeid_uid_sanadid,amount,acc_type,inv_type2,notes,credit,debit,period,aqd_id,customer_id,aqar_id,post_status, trans_date ,u_edara_office_id,system_user_id) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s, %s,%s, %s,%s, %s,%s,  %s,%s, %s,%s,%s)",

                                GetSQLValueString($row_Recordset2['id'], "text"),


                                GetSQLValueString( "percent" , "text"),

                                GetSQLValueString($aparent_cost , "text"),

                                GetSQLValueString($_GET["cs"], "int"),

                                GetSQLValueString("sanad", "text"),
                                GetSQLValueString($kjo2, "int"),

                                GetSQLValueString($total_added_vat_percent_inv, "double"),

                                GetSQLValueString($ref_sanad_id."_".$kjo2  , "text"),
                                GetSQLValueString($maout_vat, "double"),
                                GetSQLValueString("qaid2", "text"),
                                GetSQLValueString($inv_type, "text"),
                                GetSQLValueString("����� ���� ���� ������ ( ".$malk_percent."%)".$row_Recordset1_malkaqar["a_name"]." - ".$ld_name." ".$row_Recordset2["name_search"], "text"),
                                GetSQLValueString($price_vat_credit2_inv, "double"),
                                GetSQLValueString($price_vat_debit2_inv, "double"),
                                GetSQLValueString($pay_type, "int"),
                                GetSQLValueString($sanad_id, "int"),
                                GetSQLValueString($row_Recordset1_malkaqar["id1"], "int"),
                                GetSQLValueString($aqar_id2, "int"),
                                GetSQLValueString("posted", "text"),
                                GetSQLValueString($mydate  , "text"),
                                GetSQLValueString(myint_decrypt($_SESSION['edara_office_id']), "int"),
                                GetSQLValueString(myint_decrypt($_SESSION['admin_id']), "int") );
                            $Result1 = mysql_query($insertSQL5) or die(mysql_error());


                            /////





                            $insertSQL6 =   "INSERT INTO  tbl_sanad_items (cbox_added_vat_number,cbox_added_vat,main_addition_acc, aqar_id,trans_date,system_user_id,row_qaid_count,amount,sanad_item_id,

post_status,sanad_qaid_temp_table_ref,main_acc,sanad_type,u_edara_office_id,
  notes,customer_id,debit,credit, cost_center_id

    ) VALUES ('".$row_Recordset23['id']."','vat_taswiat','vat_taswiat','$aqar_id',

   '".$mydate."','".$_POST['user_show_on_screen']."','".$kjo."','".abs($shoraka_total_amount_dc)."'   ,'".$sanad_item_id."','posted','". $ref_sanad_id."','$aparent','from_acc',".myint_decrypt($_SESSION['edara_office_id']).",'����� ���� ���� ������ ( ".$malk_percent."%)".$row_Recordset1_malkaqar["a_name"]." - ".$ld_name." ".$row_Recordset2["name_search"]."','".$row_Recordset1_malkaqar["id1"]."','".$debit."' , '".$credit."' ,'".$_GET['cs']."' )"   ;


                            $Result1 = mysql_query($insertSQL6) or die(mysql_error());

                            $insertSQL7 =   "INSERT INTO  tbl_sanad_items (cbox_added_vat_number,cbox_added_vat,main_addition_acc, aqar_id,trans_date,system_user_id,row_qaid_count,amount,sanad_item_id,

post_status,sanad_qaid_temp_table_ref,main_acc,sanad_type,u_edara_office_id,
  notes,customer_id,debit,credit, cost_center_id

    ) VALUES ('".$row_Recordset2['id']."','percent','percent','$aqar_id',

   '".$mydate."','".$_POST['user_show_on_screen']."','".($kjo2)."','".abs($shoraka_total_amount_dc)."'   ,'".$sanad_item_id."','posted','". $ref_sanad_id."','$aparent','to_acc',".myint_decrypt($_SESSION['edara_office_id']).",'����� ���� ���� ������ ( ".$malk_percent."%)".$row_Recordset1_malkaqar["a_name"]." - ".$ld_name." ".$row_Recordset2["name_search"]."','".$row_Recordset1_malkaqar["id1"]."','".$credit."' , '".$debit."' ,'".$_GET['cs']."' )"   ;


                            $Result1 = mysql_query($insertSQL7) or die(mysql_error());



                        }

                    }else{

                        if($debit>0 or $credit>0)  {   $insertSQL =   "INSERT INTO  tbl_sanad_items ( aqar_id,trans_date,system_user_id,row_qaid_count,amount,sanad_item_id,

post_status,sanad_qaid_temp_table_ref,main_acc,sanad_type,u_edara_office_id,
  notes,customer_id,debit,credit, cost_center_id

    ) VALUES ('$aqar_id',

   '".$mydate."','".$_POST['user_show_on_screen']."','".$jt."','".abs($shoraka_total_amount_dc)."'   ,'".$sanad_item_id."','posted','". $ref_sanad_id."','$aparent','$mysanad_type',".myint_decrypt($_SESSION['edara_office_id']).",'����� ���� ���� ������ ( ".$rowsite["percent"]."%)".$row_Recordset1_malkaqar["a_name"]." - ".$ld_name." ".$row_Recordset2["name_search"]."','".$row_Recordset1_malkaqar["id1"]."','".$debit."' , '".$credit."' ,'".$_GET['cs']."' )"   ;


                            $Result1 = mysql_query($insertSQL) or die(mysql_error());
                        }
                    }









                }


            }}




    }
    ?>

    <div class="content">
        <div class="formDiv" style="overflow-y: auto; height: 94vh;">

            <div class="col-md-12" >
                <h1 class="formTitle" style="margin-left: auto;">  <? echo $sanad_add ;?>  </h1>
                <span style=" padding: 5px 15px;
    background: #eaf9ff; float: left;
    border-radius: 15px;"> <? echo $user_text563; //������ ������ ?> :
 <? 	  $query_Recordset2u = "SELECT * FROM tbl_users where u_id=".myint_decrypt($_SESSION['admin_id']) ;
 $Recordset2u = mysql_query($query_Recordset2u ) or die(mysql_error());
 $row_Recordset2u = mysql_fetch_assoc($Recordset2u);
 echo $row_Recordset2u['u_username'];
 ?></span>
                <input type='hidden' name='user_show_on_screen' value="<? echo myint_decrypt($_SESSION['admin_id']);?>"  />
            </div>
            <form method="post" name="form1" id="form1" action="<?php echo $editFormAction; ?>"   onkeypress="return event.keyCode != 13;" enctype="multipart/form-data">



                <div class="clientType">
                    <div class="selectClient">

                        <? if($pagemenu=="mqawl"){?>
                            <a class="popup-youtube" href="<? echo "emqawl/aqar_cust_select.php?user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=mosahem&day=tus &form=form1&field=customer_id&field2=customer_name&field3=aqar_id&field4=aqar_name"; ?>">
                                <div class="client" >
                                    <div class="clientTypeContainer">
                                        <img src="new_theme_style/img/rentalBlue.svg" alt="">
                                        <span class="clientTypeChecked"><? echo $estthmar102;?></span>
                                    </div>

                                </div>
                            </a>
                            <a class="popup-youtube" href="<? echo "edara/aqar_cust_select.php?user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=mqawl&day=tus &form=form1&field=customer_id&field2=customer_name&field3=aqar_id&field4=aqar_name"; ?>">

                                <div class="client" >
                                    <div class="clientTypeContainer">
                                        <img src="new_theme_style/img/rentalBlue.svg" alt="">
                                        <span class="clientTypeChecked"><? echo $estthmar103;?></span>
                                    </div>
                                </div>
                            </a>

                        <? } else{?>  <?  }?>

                        <? if($_GET["type"]!="qaid"  ){?>

                        <? if(  $_GET["cat"]=="solfa" or   $_GET["cat"]=="ejaza" or $_GET["cat"]=="rateb" or $_GET["cat"]=="purchase" or $_GET["cat"]=="purchase_khedma" or $_GET["cat"]=="purchase_sell"  ) ;else  {?>



                            <?   if($_SESSION['gen_show_applay_menu']!=90 ){
                                if( $_GET["cat"]!="inv" and $_GET["cat"]!="mqawl")  { ?>
                                    <a class="popup-youtube" href="<? echo "edara/aqar_cust_select.php?user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=malk&masrofat_eradat=".$_GET["masrofat_eradat"]."&form=form1&field=customer_id&sanad_type=".$_GET["type"]."&field2=customer_name&field3=aqar_id&field4=aqar_name&field12=tnote&field13=taklofanote&field14=as_meiah_kahrabnote&field15=meiah_note&field16=khraba_note&field17=cost_center_name&field18=cost_center_id&field19=ejar_id&field22=added_vat_note&field23=gazz_note&field24=aqd_qost_added_vat_note&field25=offise_kdmat_note&field26=offise_kdmat_added_vat_note&field27=eskan_gov_note"; ?>">
                                        <div class="client" >
                                            <div class="clientTypeContainer">
                                                <img src="new_theme_style/img/ownerBlue.svg" alt="">
                                                <span class="clientTypeChecked"><? echo $malik_txt1;?></span>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="popup-youtube" href="<? echo "edara/aqar_cust_select.php?user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=mostajer&sanad_type=".$_GET["type"]."&day=tus &form=form1&field=customer_id&masrofat_eradat=".$_GET["masrofat_eradat"]."&field2=customer_name&field3=aqar_id&field4=aqar_name&field5=price&field6=treg_date&field7=treg_date_h&field8=treg_date2&field9=treg_date2_h&field10=sanad_date&field11=sanad_date_h&field12=tnote&field13=taklofanote&field14=as_meiah_kahrabnote&field15=meiah_note&field16=khraba_note&field17=cost_center_name&field18=cost_center_id&field19=ejar_id&field20=tcs&field21=tcs_name&field22=added_vat_note&field23=gazz_note&field24=aqd_qost_added_vat_note&field25=offise_kdmat_note&field26=offise_kdmat_added_vat_note&field27=eskan_gov_note"; ?>">

                                        <div class="client" >
                                            <div class="clientTypeContainer">
                                                <img src="new_theme_style/img/rentalBlue.svg" alt="">
                                                <span class="clientTypeChecked"><? echo $edara_menu_malek2_txt;?></span>
                                            </div>
                                        </div>
                                    </a>

                                    <a class="popup-youtube" href="<? echo "edara/aqar_cust_select.php?user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=moshtari&sanad_type=".$_GET["type"]."&day=tus &form=form1&field=customer_id&masrofat_eradat=".$_GET["masrofat_eradat"]."&field2=customer_name&field3=aqar_id&field4=aqar_name&field5=price&field6=treg_date&field7=treg_date_h&field8=treg_date2&field9=treg_date2_h&field10=sanad_date&field11=sanad_date_h&field12=tnote&field13=taklofsellcashanote&field14=as_meiah_kahrabnote&field22=added_vat_note&field24=aqd_qost_added_vat_note&field26=offise_kdmat_added_vat_note"; ?>">
                                        <div class="client" >
                                            <div class="clientTypeContainer">
                                                <img src="new_theme_style/img/buyerBlue.svg" alt="">
                                                <span class="clientTypeChecked"><? echo $edara_menu_malek4_txt;?></span>
                                            </div>
                                        </div>
                                    </a>





                                <?    }} //  if($_SESSION['gen_show_applay_menu']!=90)
                            if(    $_SESSION['accounting_module']==10){
                                $query_Recordset_permission = "SELECT * FROM tbl_admin  where username='".$_SESSION["admin_username"]."'";
                                $Recordset_permission = mysql_query($query_Recordset_permission ) or die(mysql_error());
                                $row_Recordset_permission = mysql_fetch_assoc($Recordset_permission);
                                $show_mainmenu_halla_malyah_box=$row_Recordset_permission['show_mainmenu_halla_malyah_box'];

                                if($show_mainmenu_halla_malyah_box=="0") { ?>
                                    <a class="popup-youtube" href="<? echo "eacc/accout_tree/taccount.php?getsanad=yes&user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=".$_GET["type"]."&end=yes&form=form1&field=customer_id&field2=customer_name"; ?>">
                                        <div class="client" >
                                            <div class="clientTypeContainer">
                                                <img src="new_theme_style/img/accountsLogBlue.svg" alt="">
                                                <span class="clientTypeChecked"><? echo $estthmar105;?></span>
                                            </div>
                                        </div>
                                    </a>




                                <? }  if($_SESSION['gen_show_applay_menu']==90)
                                    echo"<td width=394   style=\"background: #fff; border:none\"></td> ";
                            }
                        }///end if(  $_GET["cat"]!="solfa")

                        if( $_GET["cat"]=="mqawl"){

                            ?>


                            <a class="popup-youtube" href="<? echo "edara/aqar_cust_select.php?user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=mqawl&day=tus&form=form1&field=customer_id&sanad_type=".$_GET["type"]."&field2=customer_name&field3=aqar_id&field4=aqar_name&field12=tnote&field13=taklofanote&field14=as_meiah_kahrabnote&field15=meiah_note&field16=khraba_note&field17=cost_center_name&field18=cost_center_id&field19=ejar_id&field22=added_vat_note&field23=gazz_note&field24=aqd_qost_added_vat_note&field25=gazz_note&field26=offise_kdmat_added_vat_note"; ?>" >

                                <div class="client" >
                                    <div class="clientTypeContainer">
                                        <img src="new_theme_style/img/buildingLogBlue.svg" alt="">
                                        <span class="clientTypeChecked"><? echo $estthmar103;?></span>
                                    </div>
                                </div>
                            </a>




                        <?   }
                        //  if(    $_SESSION['accounting_module']==10 or $_GET["cat"]=="solfa" or $_GET["cat"]=="rateb")

                        if( $_SERVER['SERVER_NAME']=="www.alsalamacenter.com" or $_SERVER['SERVER_NAME']=="alsalamacenter.com"){ ?>


                            <a class="popup-youtube" href="<? echo "eacc/accout_tree/taccount.php?subtree=eradat&getsanad=yes&user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=".$_GET["type"]."&end=yes&form=form1&field=customer_id&field2=customer_name"; ?>">

                                <div class="client" >
                                    <div class="clientTypeContainer">
                                        <img src="new_theme_style/img/accountsLogBlue.svg" alt="">
                                        <span class="clientTypeChecked">�������</span>
                                    </div>
                                </div>
                            </a>


                        <? }    if($_SESSION['gen_show_applay_menu']==90)
                            echo"<td width=394   style=\"background: #fff; border:none\"></td> ";



                        if($_GET["cat"]=="mqawl" )$mwidth1="111";else $mwidth1="394";
                        if(  $_GET["cat"]=="solfa" or  $_GET["cat"]=="ejaza" or  $_GET["cat"]=="rateb" or $_GET["cat"]=="purchase_khedma"   or  $_GET["cat"]=="purchase" or $_GET["cat"]=="purchase_sell" or $_GET["cat"]=="mqawl"    or  $_GET["cat"]=="inv" or $_SERVER['SERVER_NAME']=="www.alsalamacenter.com" or $_SERVER['SERVER_NAME']=="alsalamacenter.com" ) {   ?>

                            <a class="popup-youtube" href="<? echo "edara/aqar_cust_select.php?user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=mktb&day=tus &form=form1&field=customer_id&masrofat_eradat=".$_GET["masrofat_eradat"]."&field2=customer_name&field3=cat&field4=".$_GET["cat"]."&field5=price&field6=treg_date&field7=treg_date_h&field8=treg_date2&field9=treg_date2_h&field10=sanad_date&field11=sanad_date_h&field12=tnote&field13=taklofsellcashanote&field14=as_meiah_kahrabnote&field22=added_vat_note&field24=aqd_qost_added_vat_note&field26=offise_kdmat_added_vat_note"; ?>">

                                <div class="client" >
                                    <div class="clientTypeContainer">
                                        <img src="new_theme_style/img/buildingLogBlue.svg" alt="">
                                        <span class="clientTypeChecked"><? echo $estthmar104;?></span>
                                    </div>
                                </div>
                            </a>


                        <? }else{

                            if($_SESSION['gen_show_applay_menu']!=90){  ?>


                                <a class="popup-youtube" href="<? echo "eacc/accout_tree/cust_account.php?getsanad=yes&sanad_type2=".$_GET["type"]."&user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&custtype=moshtari_mktb_ext&day=tus &form=form1&field=customer_id&field2=customer_name&field3=aqar_id&field4=aqar_name"; ?>">

                                    <div class="client" >
                                        <div class="clientTypeContainer">
                                            <img src="new_theme_style/img/buildingLogBlue.svg" alt="">
                                            <span class="clientTypeChecked"><? echo $estthmar104;?></span>
                                        </div>
                                    </div>
                                </a>
                            <?  }


                        }
                        if($_SESSION['gen_show_applay_menu']!=90){ if( $_GET["cat"]!="inv")  {?>




                            <a class="popup-youtube" href="<? echo "edara/customer_add.php?popup=yes&id=".myint_decrypt($_SESSION['edara_office_id']).

                                "&p_id=$id&u=".myint_decrypt($_SESSION['admin_id'])."&day=tus &form=form1&field=customer_id&field2=customer_name&type=all"; ?>">   <button class="AddNew">
                                    + <?  echo $sanad_add ; ?>
                                </button>
                            </a>

                        <?   }}  ?>

                        <? if($_GET['aqar_id']!=""){  $query_Recordset4 = "SELECT * FROM tbl_lead_edara  where id=".intval($_GET['aqar_id']);
                            $Recordset4 = mysql_query($query_Recordset4 ) or die(mysql_error());
                            $row_Recordset4 = mysql_fetch_assoc($Recordset4);
                        }

                        if($_GET['customer_id']!=""){
                            $query_Recordset2 = "SELECT * FROM tbl_customer where id=".$_GET['customer_id'];
                            $Recordset2 = mysql_query($query_Recordset2 ) or die(mysql_error());
                            $row_Recordset2 = mysql_fetch_assoc($Recordset2);

                        }
                        if( $_GET["cat"]=="rateb" or  $_GET["cat"]=="ejaza" or  $_GET["cat"]=="purchase" or $_GET["cat"]=="purchase_sell" or  $_GET["cat"]=="purchase_khedma"){
                            $id=  secure( "str",ID_hash($_GET["id"],"dec")) ;
                            $rateb_id=$id;

                            if(   $_GET["cat"]=="purchase" or $_GET["cat"]=="purchase_sell")
                                $query_Recordset77="select amountpaid,sanad_amount, id as inv_id, total as total_amount ,sup_id as customer_id  from tbl_inv_purchase_invoice where id=".$id. $sql_u_edara;

                            else if(   $_GET["cat"]=="purchase_khedma")
                                $query_Recordset77="select amount_paid as amountpaid,sanad_amount, id as inv_id, total as total_amount ,  customer_id  from tbl_khedmat where id=".$id. $sql_u_edara;

                            else
                                $query_Recordset77="select * from tbl_hr_rateb where id=".$id. $sql_u_edara;




                            $Recordset77 = mysql_query($query_Recordset77 ) or die(mysql_error());
                            $row_Recordset77 = mysql_fetch_assoc($Recordset77);

                            if(   $_GET["cat"]=="purchase" or $_GET["cat"]=="purchase_sell") $rateb_total_amount=$row_Recordset77["total_amount"]- $row_Recordset77["sanad_amount"]-$row_Recordset77["amountpaid"];
                            else if(   $_GET["cat"]=="purchase_khedma") $rateb_total_amount=$row_Recordset77["total_amount"]- $row_Recordset77["sanad_amount"]-$row_Recordset77["amountpaid"];
                            else
                                $rateb_total_amount=$row_Recordset77["total_amount"];

                            $rateb_id_text=$row_Recordset77["rateb_id"] ;
                            $inv_id_text=$row_Recordset77["inv_id"] ;


                            $query_Recordset2 = "SELECT * FROM tbl_customer where id=".$row_Recordset77["customer_id"] ;
                            $Recordset2 = mysql_query($query_Recordset2 ) or die(mysql_error());
                            $row_Recordset2 = mysql_fetch_assoc($Recordset2);
                        }

                        ?>









                    </div>
                </div>

                <div class="inputsGrid" style="margin-top:0px ; row-gap: 5px ;">
                    <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                        <label class="filterlabel"><? echo $estthmar108;//������?>   <? if($_GET["type"]=="sarf"){?><strong style="font-size:10px; color:#C00">(<? echo $estthmar233;//����?>)</strong><? }?>
                            <? if($_GET["type"]=="qabd"){?><strong style="font-size:10px; color:#C00">(<? echo $estthmar234;//����?>)</strong ><? }?></label>
                        <div class="inputWithHintDiv">
                            <input name="customer_name" type="text" id="customer_name"  class="filterInput  :required" onChange=""  readonly="true"   size="32" value="<?php echo     trim(mystr_decrypt( $row_Recordset2["name"]));?>" />
                        </div>
                    </div>
                    <input name="customer_id" type="hidden"  value="<?php

                    if($row_Recordset77["customer_id"]>0)echo $row_Recordset77["customer_id"];
                    else
                        echo $_GET['customer_id'];

                    ?>"    id="customer_id">
                    <?  if($_GET['acc']=="ret_div_per_tamien_seianah" )  {?><input name="aqar_name"  type="hidden"    id="aqar_name" /><input name="aqar_id" value="<?php echo $_GET['aqar_id'];?>"   type="hidden"    id="aqar_id" /><? }?>
                    <?  if($_GET['acc']!="ret_div_per_tamien_seianah" )  {?>

                        <? if($_SESSION['gen_show_applay_menu']!=90){?>
                            <? if(  $_GET["cat"]=="ejaza666"  ) {?>
                                <div class="filterContainer">
                                    <label class="filterLabel"> <? echo $user_text275;//��� ���� ?> </label>
                                    <div class="inputWithHintDiv">
                                        <input type="text" name="last_rateb" id="last_rateb" class="filterInput  <? if($_GET["type"]=="qaid") {?>:required<?php }?>"  readonly="readonly" value="" size="32" />

                                    </div>

                                </div>
                                <div class="filterContainer">
                                    <label class="filterLabel"> <? echo $$estthmar1762;//���� ��������?> </label>
                                    <div class="inputWithHintDiv">
                                        <input type="text" name="rased_ejaza" id="rased_ejaza" class="filterInput  <? if($_GET["type"]=="qaid") {?>:required<?php }?>"  readonly="readonly" value="" size="32" />

                                    </div>

                                </div>



                            <? } if(  $_GET["cat"]=="ejaza555"  ) {?>
                                <div class="filterContainer">
                                    <label class="filterLabel"> <? echo $user_text276;//������ ������� �����?><</label>
                                    <div class="inputWithHintDiv">
                                        <input type="text" name="days_ejaza" id="days_ejaza" class="filterInput  <? if($_GET["type"]=="qaid") {?>:required<?php }?>"  readonly="readonly" onChange="ejaza_cost(this.value)" value="<? echo $_GET["days"];?>" size="32" />

                                    </div>

                                </div>



                            <? }if(  $_GET["cat"]=="solfa" or  $_GET["cat"]=="ejaza" or  $_GET["cat"]=="rateb"  or  $_GET["cat"]=="inv"  );else{?>
                                <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                    <label class="filterLabel"><? echo $property_txt;//������?></label>
                                    <div class="inputWithHintDiv">

                                        <a class="popup-youtube" href="<? echo "edara/aqar_select_and_type.php?user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=$type&day=tus &form=form1&field=aqar_id&field2=aqar_name&field3=type"; ?>">
                                            <input name="aqar_name"   type="text" id="aqar_name" onchange="" class="filterInput green-field "  readonly="true"   size="32"   onChange=""
                                                   size="32" value="<?php echo  $row_Recordset4['ld_name'];?>"  readonly="true"    <? if($_GET['acc']!="ret_div_per_tamien_seianah" ){?>���� ������<? } ?>   />
                                        </a>
                                    </div>
                                </div>

                            <? } }}?>

                    <? } ///qaid ?>

                    <input name="aqar_id"  type="hidden"    id="aqar_id" value="<?php echo  $_GET["aqar_id"];?>" />
                    <input name="type" type="hidden"  id="type" />
                    <input name="sanad_qabd_sarf_type2" type="hidden"  value="<? if($_GET["type2"]!="")echo $_GET["type2"]; else echo $_GET["type"];?>" id="sanad_qabd_sarf_type2" />
                    <input type="hidden" name="tcs_name"  id="tcs_name"  value=""    />
                    <input type="hidden" name="tcs"  id="tcs"  value=""    />
                    <input type="hidden" name="treg_date"  id="treg_date"  value=""    />
                    <input type="hidden" name="treg_date_h"  id="treg_date_h"  value=""  />
                    <input type="hidden" name="price"  id="price"  value="<?php if($rateb_total_amount>0)echo $rateb_total_amount;
                    else echo  $_GET["price"];?>"  />
                    <input type="hidden" name="thereisrow"  id="thereisrow"  value="0"  />
                    <input type="hidden" name="tsendcopytoeradat"  id="tsendcopytoeradat"  value=""  />
                    <input type="hidden" name="added_vat_asas_naqdi"  id="added_vat_asas_naqdi"  value=""  />
                    <?php  $_SESSION["total_rows_counter"]=0;$_SESSION["qastmstajer_counter"]=0; ?>
                    <input type="hidden" name="total_rows"  id="total_rows"  value="1"  />
                    <?  if($_SERVER['SERVER_NAME']=="qualityexperts.com.sa"  or $_SERVER['SERVER_NAME']=="www.qualityexperts.com.sa"  ){?>
                        <input type="hidden" name="ref_no" class="form-control"  value="" size="32" />

                    <? }
                    else{
                        ?>

                        <div class="filterContainer two_span" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"> <?  echo $notes_txt ; ?> </label>
                            <div class="inputWithHintDiv">
                                <input type="text" name="note_main" class="filterInput  <? if($_GET["type"]=="qaid") {?>:required<?php }?>"  value="<?  if($rowstotal_rateb_to_sarf!=0)echo   $rowstotal_rateb_to_sarf_notes;?>" size="32" />
                            </div>
                        </div>
                    <? }?>

                    <? if($_GET["type"]=="qaid" or $_GET["type"]=="sarf" or $_GET["type"]=="qabd") {


                        if($_GET["vat"]=="yes") ;else{?>

                            <div class="filterContainer">
                                <label class="filterLabel"><? echo $user_text47;//��� �����.?></label>
                                <?


                                echo"<SELECT name=sanad_added_vat_inv_number  id=sanad_added_vat_inv_number class=\"form-control :required\"  style=\"height:38px !important ;\"  ";

                                //  if($_GET["type"]=="qabd") { echo"disabled=\"disabled\" "; }
                                echo ">
   <option value=\"\" selected=\"selected\">[ $choose ]</option>";


                                $query_Recordset204cm = "SELECT * FROM tbl_general  where gen_id=1" ;
                                $Recordset204cm = mysql_query($query_Recordset204cm) or die(mysql_error());
                                $row_Recordset204cm = mysql_fetch_assoc($Recordset204cm);

                                $gen_emp_ejar_percent_u_id=$row_Recordset204cm["gen_emp_ejar_percent_u_id"];

                                if($row_Recordset204cm["gen_added_vat_inv_number"]!="")echo  "  <option value=\"-1\"  >".$row_Recordset204cm["gen_added_vat_inv_number"]."- $cust_report62 </option>";

                                $cid=0;
                                $q="SELECT  distinct added_vat_number ,name_search,id FROM tbl_customer   where customer_is_active='yes' and added_vat_number!='' and   ( type='malk' or type='mqawl') and u_edara_office_id=".myint_decrypt($_SESSION['edara_office_id'])  ." ORDER BY 'added_vat_number' DESC";
                                $result2 = mysql_query($q);
                                if (!$result2) {    die("Query to show fields from table failed");}
                                while($row = mysql_fetch_row($result2))
                                {
                                    echo" <option value=$row[2]";
                                    if($row[2]==$_POST["sanad_added_vat_inv_number"] or $row[0]==$row_Recordset204cm["gen_added_vat_inv_number"] ){echo"  ";}
                                    echo">".$row[0]."-".$row[1]." </option>";

                                }
                                echo"</select>";

                                mysql_free_result($result2); ?>



                            </div>


                        <? }
                    }
                    include "Hijri_GregorianConvert.class";

                    $DateConv=new Hijri_GregorianConvert;
                    $format="YYYY-MM-DD";

                    $dd= date("Y")."-".date("m")."-".date("d");
                    $dd_h= $DateConv->GregorianToHijri($dd,$format);


                    if($_GET["reg_date_h"]!="") $dd_h=$_GET["reg_date_h"];
                    if($_GET["reg_date"]!="") $dd=$_GET["reg_date"];

                    if($_GET["type"]=="qaid")
                    {?>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $date_txt;//�������?> <span class="meta"><? echo $m_txt;//��?></span>	</label>
                            <div class="inputWithHintDiv">
                                <input type="text" name="sanad_date"   id="sanad_date"  onchange="check_datee(this.value,'sanad_date_h')" value=""  readonly="true" class="filterInput :required"  autocomplete="off"   />
                                <img src="new_theme_style/img/calendarInput.svg" alt="" >

                            </div>
                        </div>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $date_txt;//�������?> <span class="meta"><? echo $h_txt;//��?></span> </label>
                            <div class="inputWithHintDiv">
                                <input type="text" name="sanad_date_h"   readonly="true"  onchange="check_datee(this.value,'sanad_date')" id='sanad_date_h' value="" class="filterInput :required"   autocomplete="off"  />
                                <img src="new_theme_style/img/calendarInput.svg" alt="" >
                            </div>
                        </div>
                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $name_txt;//�����?>

                                <a class="popup-youtube" href="<? echo "edara/area_search.php?user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=mostajer&day=tus&sanad_qaid=yes&form=form1&field=cust_name2&field2=cust_name2_vat&ejar_add=".$_SESSION['admin_id'].""; ?>">

                                    >>>  </a>
                            </label>
                            <div class="inputWithHintDiv">


                                <input type="text" name="cust_name2" id="cust_name2" class="filterInput "  value="" size="32" />
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $user_text410; //����� ������� �����?></label>
                            <div class="inputWithHintDiv">
                                <input type="text" name="cust_name2_vat"  id="cust_name2_vat" class="filterInput  "  value="" size="32" />
                            </div>
                        </div>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $user_text565; //  ������� �����?></label>
                            <div class="inputWithHintDiv">
                                <input type="text" name="cust_name2_add"  id="cust_name2_add" class="filterInput"  value="" size="32" />
                            </div>
                        </div>

                    <? }else{?>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $name_txt;//�����?></label>
                            <div class="inputWithHintDiv">
                                <input type="text" name="cust_name2" class="filterInput"  value="" size="32" />
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"> <? echo $user_text410; //����� ������� �����?></label>
                            <div class="inputWithHintDiv">
                                <input type="text" name="cust_name2_vat" class="filterInput"  value="" size="32" />
                            </div>
                        </div>


                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel">  <? echo $user_text565; //  ������� �����?></label>
                            <div class="inputWithHintDiv">
                                <input type="text" name="cust_name2_add" class="filterInput"  value="" size="32" />
                            </div>
                        </div>

                        <? if($_GET["type"]=="qaid"){?>



                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthr80;//��� ���� ����?></label>
                                <div class="inputWithHintDiv">
                                    <input name="need_row_debit" type="text" id="need_row_debit"  class="filterInput :float" onChange=""   size="32" value="1" />
                                </div>
                            </div>
                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $estthr81;//��� ���� ����?></label>
                                <div class="inputWithHintDiv">
                                    <input name="need_row_credit" type="text" id="need_row_credit"  class="form-control  :float" onChange=""     size="32" value="1" />

                                </div>

                            </div>
                        <? }?>



                    <? }?>

                    <?

                    if($_SESSION['gen_added_vat']>0){

                        $_gen_added_vat2=$_SESSION['gen_added_vat'];

                    }

                    else $_gen_added_vat2=0;


                    ?>
                    <input type="hidden" name="added_vat" class="form-control  "  value="<? echo $_gen_added_vat2;?>" size="32" />

                    <? if(  $_GET["type"]=="sarf" or   $_GET["type"]=="qaid"  ) {?>




                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"> <? echo $m_snotes53_txt;//����� ����� ?></label>

                            <select name="repeat_sanad" id="repeat_sanad"  onChange="get_repeat_sanad(this.value)" class="form-control "  style="height:38px !important ; ">

                                <option value="0"><? echo $estthmar371;//��?></option>
                                <option value="1"><? echo $estthmar318;//���?></option>
                            </select>
                        </div>


                        <div id="data_repeat_sanad" style="display: none; flex-direction: column ;    flex-direction: column;background:#eaf9ff;padding: 5px;border-radius: 8px;" > </div>

                        <? if(    $_GET["type"]=="qaid"  ) {?>

                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $user_text159;// ��� ���� ?></label>

                                <select name="sanad_type3" id="sanad_type3"  class="form-control   "  style="height: 39px !important;">

                                    <option value="-1" selected="selected"> <? echo  $choose;// ����?> </option>
                                    <option value=""  	<?php
                                    if($_SERVER['SERVER_NAME']=="www.jehangroup.net" or  $_SERVER['SERVER_NAME']=="jehangroup.net")echo" selected=\"selected\"" ;?>><? echo  $estthmar284;//  ��� ?></option>
                                    <option value="qabd"> <? echo  $estthmar286;// ��� ���?></option>
                                    <option value="sarf"><? echo  $estthmar285;//��� ���?></option>
                                </select>
                            </div>

                        <? }} if($_GET["type"]=="qaid");else{?>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $date_txt;//�������?>  	<span class="meta"><? echo $m_txt;//��?></span></label>
                            <div class="inputWithHintDiv">
                                <input type="text" name="sanad_date"   id="sanad_date" onChange="check_datee(this.value,'sanad_date_h')"   readonly="true"   value="<? echo  $dd;?>" class="filterInput  :required"  autocomplete="off"  />
                                <img src="new_theme_style/img/calendarInput.svg" alt="" >
                            </div>
                        </div>

                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $date_txt;//�������?> <span class="meta"><? echo $h_txt;//��?></span></label>
                            <div class="inputWithHintDiv">
                                <input type="text" name="sanad_date_h" value="<? echo $dd_h;?>" class="filterInput :required"  readonly="true"  id="sanad_date_h" onChange="check_datee(this.value,'sanad_date')" autocomplete="off"   />

                                <img src="new_theme_style/img/calendarInput.svg" alt="" >
                            </div>
                        </div>
                    <? }?>

                    <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                        <label class="filterLabel"><? echo $estthmar745;//������?></label>
                        <div class="inputWithHintDiv">
                            <input type="text" name="ref_no" class="filterInput"  value="<?php
                            if( $_GET["seianah_ticket_id"]!="")echo $ticket_raqam_txt.": ". $_GET["seianah_ticket_id"];
                            if(   $_GET["cat"]=="purchase_khedma") echo   $khedmaid;
                            if(   $_GET["invoice_id"]!="") echo    secure( "str",ID_hash($_GET["invoice_id"],"dec"));
                            ?>" size="32" />

                        </div>
                    </div>



                    <? if($_GET["type"]=="qabd"){?>

                        <? if($_SESSION['gen_show_applay_menu']!=90){

                            ?>





                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"><? echo $m_snotes54_txt;//����� ������?></label>
                                <div class=" ">

                                    <?
                                    if($gen_emp_ejar_percent_u_id!=""){
                                        ?>
                                        <table width="100%"  class=" "  cellpadding="3">

                                            <tr>




                                                <?
                                                $q=mysql_query("select * from tbl_customer  where  type='mktb' and (emp_ejar_percent is not null or emp_ejar_percent2 is not null or emp_ejar_percent3 is not null ) and customer_is_active='yes'  and id>0 ". $sql_u_edara);
                                                while($n=mysql_fetch_array($q)){?>

                                                    <td>  <p style="font-size:11px"> 	 <input name="ee_<? echo $n[id];?>" style="  width: 14px; margin-top:5px; margin-left:3px;"  type="checkbox" value="0"     />
                                                            <? echo trim(mystr_decrypt($n['name']));?></p></td>

                                                    <?

//if($n[id]==$row_Recordset1['emp_ejar_percent_u_id'])echo "selected='selected'";

                                                }



                                                ?>
                                            </tr></table>
                                        <?

                                    }


                                    else{?>
                                        <select  name="emp_ejar_percent_u_id" id="emp_ejar_percent_u_id" size="1"
                                        >


                                            <option value="" selected="selected"   ><? echo $name_txt;?></option>
                                            <? //(emp_ejar_percent2>0 or emp_ejar_percent>0)
                                            $q=mysql_query("select * from tbl_customer  where  type='mktb' and (emp_ejar_percent is not null or emp_ejar_percent2 is not null or emp_ejar_percent3 is not null )  and customer_is_active='yes'  and id>1  ". $sql_u_edara);
                                            while($n=mysql_fetch_array($q)){
                                                echo "<option value=$n[id] ";

                                                if($n[id]==$row_Recordset1['emp_ejar_percent_u_id'])echo "selected='selected'";

                                                if($_SERVER['SERVER_NAME']=="mbahadi.com"  or $_SERVER['SERVER_NAME']=="www.mbahadi.com"  ){
                                                    if($n[id]==4)echo "selected='selected'";

                                                }


                                                echo" >".trim(mystr_decrypt($n['name']))."</option>";
                                            }

                                            ?>

                                        </select> <? }?> </div></div>
                        <? } }?>



                    <?php if($_SESSION['accounting_module']==10) {

                        if($_GET["type"]=="qaid4444444444");else{

                            ?>


                            <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                                <label class="filterLabel"> <? echo $estthmar144;//���� �����?> <? // if($_GET["type"]=="qabd")echo$estthmar234 ;else echo $estthmar233;?></label>
                                <div class="inputWithHintDiv">

                                    <a class="popup-youtube" href="<? echo "eacc/accout_tree/cs_account.php?getsanad=yes&user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=".$_GET["type"]."&day=tus &form=form1&field=cost_center_id&field2=cost_center_name"; ?>">


                                        <input name="cost_center_name"   type="text" id="cost_center_name" onchange="" class="filterInput green-field  <? if(  $_SERVER['SERVER_NAME']=="www.arkaaan.com" or $_SERVER['SERVER_NAME']=="arkaaan.com" ) {?> :required<? }?>"      size="32"   onChange=""   size="32"  style="width:88% !important;"   > </a>
                                </div>
                            </div>

                        <? }}else{?>
                        <input name="cost_center_name"   type="hidden" id="cost_center_name" />
                    <? }?>
                    <input name="cost_center_id"  type="hidden"    id="cost_center_id" />
                    <? 	   if( $_SERVER['SERVER_NAME']=="www.srtq1.com" or $_SERVER['SERVER_NAME']=="srtq1.com" or $_SERVER['SERVER_NAME']=="www.srtq2.com" or $_SERVER['SERVER_NAME']=="srtq2.com" or $_SERVER['SERVER_NAME']=="www.srtq3.com" or $_SERVER['SERVER_NAME']=="srtq3.com"  or $_SERVER['SERVER_NAME']=="www.srtq4.com" or $_SERVER['SERVER_NAME']=="srtq4.com" ) {

                        if($_GET["type"]=="sarf"){?>

                            <div class="checkContainer">
                                <input type="checkbox" name="cost_center_main_type" id="cost_center_main_type" value="credit" >
                                <label for="feeCheckbox1_optional">  ��� ����� ������� �� ������ ������ ������  </label>
                            </div>
                        <? }?>
                        <? if($_GET["type"]=="qabd"){?>
                            <div class="checkContainer">
                                <input type="checkbox" name="cost_center_main_type" id="cost_center_main_type" value="debit" >
                                <label for="feeCheckbox1_optional">  ��� ����� ������� �� ������ ������ ������  </label>
                            </div>

                        <? }}?>

                    <div class="filterContainer">
                        <span class="filterLabel"> <? echo $img_0_txt;//����?></span>
                        <div class="inputWithHintDiv attachInput" onClick="ld_im0FileEvent()" style="height:40px;">
                            <img src="new_theme_style/img/camera.svg" alt="">


                        </div>
                        <label class="path_label" id="file_upload_label"> </label>
                        <input hidden id="file_upload" type="file" name="ld_im1" value="" class="form-control " size="32"
                               onChange="get_img_path(event)" />
                    </div>

                    <? if($_GET["type"]=="qabd") {
                        if(  $_SERVER['SERVER_NAME']=="www.f1010200.com" or $_SERVER['SERVER_NAME']=="f1010200.com" ){?>
                            <div class="checkContainer">
                                <input type="checkbox" name="estqta_ejar_no_vat" id="estqta_ejar_no_vat" value="0" >
                                <label for="feeCheckbox1_optional">  ������ ����� ���� ����� </label>
                            </div>

                        <? } }?>

                    <? if($_GET["type"]=="qaid"  );else{?>
                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <label class="filterLabel"><? echo $m_snotes51_txt;//��� ����� ?>	</label>
                            <div  id="content_sanad_listBox" style="width:100%"></div>

                        </div>



                        <div class="filterContainer" style="direction:rtl;float:right;text-align: right;">
                            <? if($_GET["type"]!="sarf"){?><label  style="  color:#FFF" >......................	 </label> <? } ?>
                            <div class="form-group">
                                <input name="add" id="add" type="button" value="+ <? echo $m_snotes52_txt;//��� ������ ����� ?>" style="width:223px;height: 30px; background: #eaf9ff;" onClick="getSanad<? if($_GET["type"]=="qaid")echo"_qaid";?>(typedata.value,0);" />
                            </div>
                        </div>
                    <? }?>
                    <? if($_GET["type"]=="qaid"){?>
                        <div class="checkContainer">
                            <input type="checkbox" name="qaid_print_as_inv" id="qaid_print_as_inv" value="0">
                            <label for="feeCheckbox1_optional">  <? echo $user_text566;//������� ������� ?></label>
                        </div>

                    <?  }?>

                    <script language="javascript">
                        <? if($_GET["type"]=="qaid"){?>

                        function checkI_perice(p,price_to )
                        {

                            price_to.value =p.value;





                        }
                        <? }?>

                        function cal_debit_credit(){




                            var credit_text =0; var debit_text =0;
                            if(parseFloat(document.getElementById("debit_text0").value)>0)
                                debit_text =  parseFloat(document.getElementById("debit_text0").value);


                            var total_qaid_debit = parseFloat( document.getElementById("total_qaid_debit").value);

                            if(parseFloat( document.getElementById("credit_text0").value)>0)
                                credit_text = parseFloat( document.getElementById("credit_text0").value);
                            var total_qaid_credit = parseFloat(document.getElementById("total_qaid_credit").value);

                            total_from_acc= parseFloat(  debit_text)+  parseFloat(total_qaid_debit);

                            total_to_acc= parseFloat(  credit_text)+ parseFloat(total_qaid_credit);



                            document.form1.total_qaid_debit.value=total_from_acc.toFixed(5);
                            document.form1.total_qaid_credit.value=total_to_acc.toFixed(5);


                            document.form1.total_qaid_diff_debit_credit.value=(total_to_acc-total_from_acc).toFixed(5);


                        }



                        function validdate(){


                            console.log('validdate ');



                            document.getElementById("submit_on_enter").style.visibility = "hidden";

                            var valid = true;

                            var total_to_acc=0;

                            var total_from_acc=0;

                            if (document.form1.sanad_date.value==''    )
                            {
                                alert ( "<? echo $estthr79; //���� ������� �����?>9" );
                                valid = false; document.getElementById("submit_on_enter").style.visibility = "visible";return false;
                            }
                            <?php  if(    $_SESSION['accounting_module']==10){
                            $query_Recordset_permission = "SELECT * FROM tbl_admin  where username='".$_SESSION["admin_username"]."'";
                            $Recordset_permission = mysql_query($query_Recordset_permission ) or die(mysql_error());
                            $row_Recordset_permission = mysql_fetch_assoc($Recordset_permission);


                            if($row_Recordset_permission['nopost_sanad_on_close_year']=="0"){

                            $query_Recordset23 = "

select max(trans_date) as trans_date_last from tbl_transactions ,tbl_close_year where tbl_close_year.id=close_year_id  and     tbl_close_year.post_status='posted' and close_year_id>0
   and
  ( type  not like '%_c') and
		 (type  not like '%_cancel%')
 and  tbl_transactions.u_edara_office_id=".myint_decrypt($_SESSION['edara_office_id']);

                            $Recordset23 = mysql_query($query_Recordset23 ) or die(mysql_error());
                            $row_Recordset23 = mysql_fetch_assoc($Recordset23);


                            $trans_date_last=$row_Recordset23['trans_date_last'];









                            ?>
                            if (document.form1.sanad_date.value<'<? echo  $trans_date_last?>' <?


                                $sql99 = "select * from tbl_close_month_trans  where post_status='posted' and   u_edara_office_id=".myint_decrypt($_SESSION['edara_office_id']);

                                $result99 = mysql_query($sql99);

                                $rows99 = mysql_num_rows($result99);

                                if($rows99!=0){
                                    for($j99=0;$j99<$rows99;$j99++)
                                    {
                                        $row99 = mysql_fetch_array($result99);
                                        $month_close_date=$row99["reg_date"];
                                        $month_close_date2=$row99["reg_date2"];

                                        echo" || (document.form1.sanad_date.value<='".$month_close_date2."' && document.form1.sanad_date.value>='".$month_close_date."') ";


                                    }}


                                ?> )
                            {
                                alert ( "<? echo $user_text277;//���� ����� �� ���� ������� ��� �����?>" );
                                valid = false; document.getElementById("submit_on_enter").style.visibility = "visible";return false;
                            }
                            <? }}?>
                            <?php
                            $query_Recordset_permission = "SELECT * FROM tbl_admin  where username='".$_SESSION["admin_username"]."'";
                            $Recordset_permission = mysql_query($query_Recordset_permission ) or die(mysql_error());
                            $row_Recordset_permission = mysql_fetch_assoc($Recordset_permission);
                            if($row_Recordset_permission['close_month_sanad_trans']=="09999"){
                            ?>
                            if (document.form1.sanad_date.value<'<? echo  date("Y-m-01")?>'  )
                            {
                                alert ( "<? echo $user_text278;//���� ����� ��� ���� ����?>" );
                                valid = false; document.getElementById("submit_on_enter").style.visibility = "visible";return false;
                            }
                            <? } ?>



                            <? if($_GET["type"]=="qaid") {?>
                            if (document.form1.sanad_type3.value==-1    )
                            {
                                alert ( "<? echo $user_text279;//���� ��� ����� ������?>" );
                                valid = false; document.getElementById("submit_on_enter").style.visibility = "visible";return false;
                            }

                            <? }?>
                            <? if($_GET["type"]=="qaid");else{?>
                            if (document.form1.customer_name.value==''    )
                            {
                                alert ( "<? echo $estthmar93; //���� ������?>" );
                                valid = false; document.getElementById("submit_on_enter").style.visibility = "visible";return false;
                            }
                            <? if(  $_SERVER['SERVER_NAME']=="www.arkaaan.com" or $_SERVER['SERVER_NAME']=="arkaaan.com"  or $_SERVER['SERVER_NAME']=="www.doha1.net"  or $_SERVER['SERVER_NAME']=="doha1.net" ) {?>
                            if (document.form1.cost_center_name.value==''    )
                            {
                                alert ( "<? echo $inv_print34;//���� �����?>" );
                                valid = false; document.getElementById("submit_on_enter").style.visibility = "visible";return false;
                            }
                            <? }?>

                            <? }?>

                            <?   if($_GET["vat"]=="yes") ;else{?>

                            if (document.getElementById("is_aded_vat_number_empty").value>0 )
                            {
                                if(document.getElementById("sanad_added_vat_inv_number").value==""){
                                    alert ( "������ ������ ��� ����� �� ������ ���� �����" );
                                    valid = false; document.getElementById("submit_on_enter").style.visibility = "visible";return false;
                                }}
                            <? }?>
                            <? if($_GET["type"]=="qaid");else{?>

                            if (document.form1.total_added_rows.value=='' ||  document.form1.total_added_rows.value==0 )
                            {
                                alert ( "<? echo $estthr78; //��� �� ���� ��� ���� ��� �����?>" );
                                valid = false; document.getElementById("submit_on_enter").style.visibility = "visible";return false;
                            }







                            r_count=0;
                            var cbs_price_to_acc =parseInt(document.getElementById("total_open_row").value);


                            for (var i = 0; i <=  cbs_price_to_acc ; i++) {

                                r_count++;



                                if( (document.getElementById("credit_text"+r_count) ) )


                                {

                                    if(r_count==document.getElementById("max_afterdelet_row_id").value)

                                        valid = save_row_update(r_count,document.getElementById("sanad_item_id_text"+r_count).value,1,1); //submit
                                    else
                                        valid = save_row_update(r_count,document.getElementById("sanad_item_id_text"+r_count).value,1,0);

                                    if(valid == false)
                                    {valid = false; document.getElementById("submit_on_enter").style.visibility = "visible";return false;}






                                }

                            }



                            <? }?>




                            <? if($_GET["type"]=="qaid"){?>

                            if (document.form1.note_main.value==''    )
                            {
                                alert ( "<? echo $estthr77; //���� ������ �������?>" );
                                valid = false; document.getElementById("submit_on_enter").style.visibility = "visible";return false;
                            }
                            <? if($_GET["type"]=="qaid");else{?>


                            if (  total_from_acc.toString() =="0"   ||  total_from_acc.toString() =="" )

                            {
                                alert ( "<? echo $estthr76; //��� ��� ��� �� ��� ����  ��� ����� - �� ���� ( - )?>" );
                                document.getElementById("submit_on_enter").style.visibility = "visible";
                                return false;
                                valid = false;
                            }


                            <? }?>

                            <? if($_GET["op"]=="add"){?> if(document.getElementById("post_status").checked == true)<? }?>
                                if (  document.form1.total_qaid_diff_debit_credit.value!=0
                                )

                                {
                                    alert ( "<? echo $estthr75; //��� �� ���� ����� ������ ����� ����� �����?>" );
                                    document.getElementById("submit_on_enter").style.visibility = "visible";
                                    return false;
                                    valid = false;
                                }

                            <? }?>

                            <? if($_GET["type"]=="qaid");else{?>

                            if (document.form1.thereisrow.value=='0888888888888888'    )
                            {
                                alert ( "<? echo $estthr74; //���� ��� ��� ���?>" );
                                valid = false; document.getElementById("submit_on_enter").style.visibility = "visible";return false;
                            }




                            <? }?>
                            <?php  if(    $_SESSION['accounting_module']==10){?>



                            var cbs_sendcopytoeradat = document.getElementsByClassName("cb");
                            var cbs_qabd_eradat_type = document.getElementsByClassName("cb_qabd_eradat_type");
                            for (var i = 0; i < cbs_qabd_eradat_type.length; i++) {

                                if (cbs_qabd_eradat_type[i].value==""  && cbs_sendcopytoeradat[i].value=="yes")
                                {
                                    alert ( "<? echo $estthr72; //���� ���� ���  ��������� �� ��� ��� ���?>" );
                                    document.getElementById("submit_on_enter").style.visibility = "visible";
                                    return false;
                                    valid = false;
                                }  if (cbs_qabd_eradat_type[i].value==""  && cbs_sendcopytoeradat[i].value=="yesmasrfoat")
                                {
                                    alert ( "<? echo $estthr73; //���� ���� ���  ��������� �� ��� ��� ������� ?>" );
                                    document.getElementById("submit_on_enter").style.visibility = "visible";
                                    return false;
                                    valid = false;
                                }

                                if (cbs_qabd_eradat_type[i].value==""  && cbs_sendcopytoeradat[i].value=="yesperiod")
                                {
                                    alert ( "<? echo $estthr72; //���� ���� ���  ��������� �� ��� ��� ���?>" );
                                    document.getElementById("submit_on_enter").style.visibility = "visible";
                                    return false;
                                    valid = false;
                                }

                            }



                            /*
                            var x=document.forms["form1"]["chek_date"].value;
                            if (x==null || x=="" || x==0)
                              {
                              alert("���� ����� ������� ����� �� �������");
                               document.getElementById("submit_on_enter").style.visibility = "visible";  valid = false;
                              return false;
                              }

                              var x=document.forms["form1"]["chek_no"].value;
                            if (x==null || x=="" || x==0)
                              {
                              alert("���� ��� ����� �� �������");
                               document.getElementById("submit_on_enter").style.visibility = "visible";  valid = false;
                              return false;
                              }

                              var x=document.forms["form1"]["debit_acc"].value;
                            if (x==null || x=="" || x==0)
                              {
                              alert("���� ������ �� �����");
                               document.getElementById("submit_on_enter").style.visibility = "visible";  valid = false;
                              return false;
                              }*/

                            <? }?>



                            /*
                                if ( document.form1.reg_date.value == "���� �������" ||  document.form1.reg_date_h.value == "���� �������"  ||  document.form1.reg_date2.value == "���� �������"  ||  document.form1.reg_date2_h.value == "���� �������" )
                                {
                                    alert ( "������ ��� ���� ����� ���� �����" );
                                    valid = false;
                                     document.getElementById("submit_on_enter").style.visibility = "visible";
                                }
                                  if ( document.form1.reg_date.value  >  document.form1.reg_date2.value    )
                                {
                                    alert ( "����� ������ �� ���� ����� ����� " );
                                    valid = false;
                                     document.getElementById("submit_on_enter").style.visibility = "visible";
                                }*/




                            //if(valid==true)return 1; else return 0;
                              return valid;



                        }
                        function someFunc() {
                            <? if($_GET["type"]=="qaid") {?>

                            if (validdate() ==false ); //false

                            else {

                                if(parseInt(document.getElementById("open_row").value)>0){
                                    alert("<? echo $estthr71; //��� ��� �� ������?>"); document.getElementById("submit_on_enter").style.visibility = "visible";
                                }
                                else


                                    document.getElementById("form1").submit();



                                }


                            <? }else {?>
                            if(parseInt(document.getElementById("open_row").value)>0)

                            {

                                if (validdate() ==false ) ; //false

                                else {
                                    <? if($_GET["type"]=="qaid") {?>
                                    if(parseInt(document.getElementById("open_row").value)>0)
                                        alert("<? echo $estthr71; //��� ��� �� ������?>");
                                    else
                                        document.getElementById("form1").submit();

                                    <? }?>
                                    ;	 }

                            }



                            else {
                                console.log('here we are');
                                if (validdate() ==false ) ; //false

                                else {
                                    console.log('here we are 2 ');
                                    if(parseInt(document.getElementById("total_added_rows").value)>0){
                                        document.getElementById("submit_on_enter").style.visibility = "hidden";

                                        document.getElementById("form1").submit();
                                    }
                                    else validdate();

                                }
                            }

                            <? }?>
                        }
                        function toggle_it(itemID){
                            // Toggle visibility between none and inline
                            if ((document.getElementById(itemID).style.display == 'none'))
                            {
                                document.getElementById(itemID).style.display = 'inline';


                                document.form1.reg_date.value = "<? echo $estthr70 ;//���� �������?>" ;
                                document.form1.reg_date_h.value = "<? echo $estthr70 ;//���� �������?>" ;
                                document.form1.reg_date2.value = "<? echo $estthr70 ;//���� �������?>" ;;
                                document.form1.reg_date2_h.value = "<? echo $estthr70 ;//���� �������?>" ;

                            } else {
                                document.getElementById(itemID).style.display = 'none';
                            }
                        }

                        //<![CDATA[
                        function get_list(list_id) {
                            var requester = false;

                            if(window.XMLHttpRequest) {
                                requester = new XMLHttpRequest;
                            } else if (window.ActiveXObject) {
                                requester = new ActiveXObject("Microsoft.XMLHTTP");
                            }

                            if(requester) {
                                requester.onreadystatechange = function() {
                                    if(requester.readyState == 0 || requester.readyState == 1) {
                                        document.getElementById(list_id).innerHTML = '<span><img src="load/co.gif"></span>';
                                    }
                                    if(requester.readyState == 4 || requester.readyState == "complete") {
                                        if(requester.status == 200 || requester.status == 304) {
                                            document.getElementById(list_id).innerHTML = requester.responseText;
                                        } else {
                                            document.getElementById( list_id).innerHTML = '<p><? echo $estthmar101;//���� ��� �� ��� ������� ��������?></p>';
                                        }
                                    }
                                }
                                requester.open("GET", "getList.php?list_id=" + list_id+"&u_id=<? echo $_SESSION['edara_office_id'];?>", true);
                                requester.send(null);

                            }
                        }
                        //]]>

                        <? if($_GET["type"]=="qaid"){?>
                        $(document).ready(function() {

                            $('.popup-youtube').magnificPopup({

                                type: 'iframe',
                                mainClass: 'mfp-fade',
                                removalDelay: 160,
                                preloader: false,

                                fixedContentPos: false
                            });


                            getSanad_listBox('<?php echo $_GET["type"];?>','')

                            get_list('safr_malk_id');
                        }); <? }?>

                        <? if($_GET["type"]=="sarf"){?>
                        $(document).ready(function() {

                            $('.popup-youtube').magnificPopup({

                                type: 'iframe',
                                mainClass: 'mfp-fade',
                                removalDelay: 160,
                                preloader: false,

                                fixedContentPos: false
                            });


                            getSanad_listBox('taccount','')

                            get_list('safr_malk_id');
                        }); <? }?>


                    </script>



                    <input name="rateb_id" type="hidden" value="<? echo $rateb_id_text;?>" />
                    <input name="inv_id" type="hidden" value="<? echo  $inv_id_text;?>" />
                    <input name="seianah_ticket_id" type="hidden" value="<? echo $_GET["seianah_ticket_id"];?>" />
                    <input name="invoice_id" type="hidden" value="<? echo secure( "str",ID_hash($_GET["invoice_id"],"dec"));?>"/>
                    <input name="price_on_period" type="hidden" value="yes" />

                    <input type="hidden" name="cs_nameqastmstajer_text0" id="cs_nameqastmstajer_text0" value=""  />
                    <input type="hidden" name="csqastmstajer_text0" id="csqastmstajer_text0" value=""  />

                    <input type="hidden" name="treg_date2" id="treg_date2" value=""  />
                    <input type="hidden"   name="treg_date2_h"   id="treg_date2_h" value=""   />
                    <input type="hidden"   name="tnote"   id="tnote" value=""   />
                    <input type="hidden"   name="taklofanote"   id="taklofanote" value=""   />
                    <input type="hidden"   name="as_meiah_kahrabnote"   id="as_meiah_kahrabnote" value=""   />
                    <input type="hidden"   name="meiah_note"   id="meiah_note" value=""   />
                    <input type="hidden"   name="khraba_note"   id="khraba_note" value=""   />
                    <input type="hidden"   name="aqd_qost_added_vat_note"   id="aqd_qost_added_vat_note" value=""   />
                    <input type="hidden"   name="offise_kdmat_added_vat_note"   id="offise_kdmat_added_vat_note" value=""   />

                    <input type="hidden"   name="added_vat_note"   id="added_vat_note" value=""   />
                    <input type="hidden"   name="gazz_note"   id="gazz_note" value=""   />
                    <input type="hidden"   name="offise_kdmat_note"   id="offise_kdmat_note" value=""   />
                    <input type="hidden"   name="eskan_gov_note"   id="eskan_gov_note" value=""   />

                    <input type="hidden"   name="ejar_id"   id="ejar_id" value=""   />
                    <input type="hidden"   name="taklofsellcashanote"   id="taklofsellcashanote" value=""   />
                    <input type="hidden"   name="div_price_percent"   id="div_price_percent" value=""   />
                    <input type="hidden"   name="malk_id"   id="malk_id" value=""   />
                    <input type="hidden"   name="malk_name"   id="malk_name" value=""   />
                    <input type="hidden"   name="malek_can_manage_aqar"   id="malek_can_manage_aqar" value=""   />

                    <input type="hidden"   name="seianah_ticket_idnote"   id="seianah_ticket_idnote" value="<? if($_GET["seianah_ticket_idnote"]!="") echo trim(mystr_decrypt($_GET["seianah_ticket_idnote"]));?>"   />

                    <input type="hidden" name="masrofat_eradat" value="<? echo $_GET["masrofat_eradat"];?>">
                    <input type="hidden" name="MM_insert" value="form16">








                </div>

                <div class="insertingInfoTableWrapper">
                    <?php

                    $inv_id_ref= date("Y-m-d H:i:s")	;

                    if($_GET["type"]=="qabd" or $_GET["type"]=="sarf" ){

                        include("edara/sanad_qaid_table/t1/table_qabd.php");
                        ?>
                        <input type="hidden" name="sannd_ref_id_u_office" value="<? echo $ref_sanad_id;?>">
                        <input style="width:66%" name="total_qaid_debit" id="total_qaid_debit" type="hidden"  readonly="readonly"  value="<?php if(round($rateb_total_amount_debit,5)>0)echo round($rateb_total_amount_debit,5); else echo"0";?>"/>
                        <input style="width:66%"  name="total_qaid_credit" id="total_qaid_credit" type="hidden"   readonly="readonly" value="0"/>
                        <input  style="width:66%"  name="total_qaid_diff_debit_credit" id="total_qaid_diff_debit_credit"  value="<?php   if(round($rateb_total_amount_debit,5)>0)echo round($rateb_total_amount_debit,5); else echo"0";?>" readonly="readonly" type="hidden" />

                    <? }if($_GET["type"]=="qaid"){
                        include("edara/sanad_qaid_table/t1/table.php");
                        ?>
                        <input type="hidden" name="sanad_qaid_temp_table_ref" value="<? echo $ref_sanad_id;?>">


                        <div class="filtersGrid">
                            <div class="filterContainer">
                                <label class="filterLabel"> <? echo $estthmar1547;//����� ����?> </label>
                                <div class="inputWithHintDiv">
                                    <input  class="filterInput" name="total_qaid_debit" id="total_qaid_debit" type="text"  readonly="readonly"  value="<?php
                                    if(round($shoraka_total_amount_debit,5)>0)echo round($shoraka_total_amount_debit,5);
                                    else
                                        if(round($rateb_total_amount_debit,5)>0)echo round($rateb_total_amount_debit,5);
                                        else echo"0";
                                    ?>"/>
                                </div>

                            </div>
                            <div class="filterContainer">
                                <label class="filterLabel"> <? echo $estthmar1548;//����� ����?></label>
                                <div class="inputWithHintDiv">
                                    <input  class="filterInput"  name="total_qaid_credit" id="total_qaid_credit" type="text"   readonly="readonly" value="<?php if(round($shoraka_total_amount_credit,5)>0)echo round($shoraka_total_amount_credit,5); else echo"0";?>"/>
                                </div>

                            </div>

                            <div class="filterContainer">
                                <label class="filterLabel"> <? echo $estthmar1549;//�����?></label>
                                <div class="inputWithHintDiv">
                                    <input  class="filterInput" name="total_qaid_diff_debit_credit" id="total_qaid_diff_debit_credit"  value="<?php   if(round($rateb_total_amount_debit,5)>0)echo round($rateb_total_amount_debit,5); else echo"0";?>" readonly="readonly" type="text" />
                                </div>

                            </div>



                        </div>



                    <? }?>



                </div>




                <div class="saveTableData">
                    <?  $query_Recordset_permission = "SELECT * FROM tbl_admin  where username='".$_SESSION["admin_username"]."'";
                    $Recordset_permission = mysql_query($query_Recordset_permission ) or die(mysql_error());
                    $row_Recordset_permission = mysql_fetch_assoc($Recordset_permission);
                    $postpart_sanad_perm_trans_permission=$row_Recordset_permission['postpart_sanad_perm_trans'];
                    $post_sanad_perm_trans_permission=$row_Recordset_permission['post_sanad_perm_trans'];

                    if(($post_sanad_perm_trans_permission=="" or $post_sanad_perm_trans_permission=="0"  )  and $_GET["type"]=="qaid222"){?>

                        <input type="hidden" name="post_status"   value="<?php if($_GET["op"]=="update" and $row_Recordset1['post_status']=="notposted")echo "notposted"; else echo"posted";?>">
                        <img  hidden src="style/images/post.png" style="height:31px; width:150px" name="submit_on_enter"  id="submit_on_enter" value="���"   alt="���" onClick="someFunc();"   />
                        <button name="submit_on_enter"  id="submit_on_enter"  onclick="someFunc();"  >  <? echo $save_txt ; ?> </button>

                    <? }else{?>
                        <? if ($post_sanad_perm_trans_permission=="" or $post_sanad_perm_trans_permission=="0"  ){?>
                            <div class="checkContainer">
                                <input type="checkbox" name="post_status" style="margin:0 ;" id="post_status" value="posted">
                                <label for="printCheck" style="margin:0 ;"><? echo $post_txt; //�����?></label>
                            </div>
                        <? }
                        else if ($postpart_sanad_perm_trans_permission=="0"  ){?>
                            <div class="checkContainer">
                                <input type="checkbox" style="margin:0 ;" name="post_status" id="post_status" value="partposted">
                                <label for="printCheck" style="margin:0 ;"><? echo $post_txt; //�����?></label>
                            </div>
                        <? }  else {?>
                            <input name="post_status"  id="post_status"  type="hidden" value="notposted" />


                        <? }?>

                        <button name="submit_on_enter"  id="submit_on_enter"  onclick="someFunc();"  >  <? echo $save_txt ; ?></button>

                        <? if ($_GET['cat']=='tasded_mostahakat'){?>
                            <a class="popup-youtube " href="<? echo "edara/tasded_mostahakat_payment.php?user_id=".$_SESSION['admin_id']."&u_id=".$_SESSION['edara_office_id']."&type=mosahem&day=tus &form=form1&field=customer_id&field2=customer_name&field3=aqar_id&field4=aqar_name"; ?>">
                                <button  >  تسديد</button>
                            </a>
                        <? } ?>


                    <? }?>

                    <input type="hidden" name="post_satuts_current" value="posted">
                    <input type="hidden" name="sanad_satuts_old" value="<? echo $row_Recordset1['sanad_satuts_old'] ;?>">    <input type="hidden" name="form_field_sanad_type2" value="<?php echo $_GET["type"];  ?>" size="32">
                    <input type="hidden" name="cat" id="cat" value="<?php echo $_GET["cat"];  ?>" size="32">
                    <input type="hidden" name="cat_sanad_qaid_row_vat_number" id="cat_sanad_qaid_row_vat_number" value="<?php echo $_GET["vat"];  ?>" size="32">
                    <input type="hidden" name="inv_id_ref" value="<?php echo  $inv_id_ref 	;  ?>" size="32">
                    <input type="hidden" name="sanad_type" value="<?php echo $_GET["type"];  ?>" size="32">
                    <input name="sand_develop_date_viersion" type="hidden" value="25122017" />
                    <input name="malk_added_vat_number"  id="malk_added_vat_number" type="hidden" value="" />
                    <? if(   $_GET["cat"]=="purchase_khedma") {?>
                        <input type="hidden" name="evrey_id_type" value="-9" size="32">
                    <? } ?>






                </div>






















            </form>

        </div>


    </div>
    <script>
        function ld_im0FileEvent() {
            $('#file_upload').trigger('click');
        }

        function get_img_path(ev) {
            // console.log(ev.target.value);
            var path = ev.target.value;
            document.getElementById('file_upload_label').innerHTML = path;

        }

        function widgetNavAction(){

        }

    </script>


    </body>
    </html>
<? }


if($_GET["type"]=="qaid");else{?>
<? }?>
