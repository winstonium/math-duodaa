<?php
header('Content-Type: text/html; charset=UTF-8');
include('adodb5/adodb.inc.php');
require_once '../qa-include/qa-base.php';
require_once QA_INCLUDE_DIR.'qa-app-captcha.php';
require_once QA_INCLUDE_DIR.'qa-app-users.php' ;
require_once QA_INCLUDE_DIR.'qa-app-users-edit.php' ;
require_once QA_INCLUDE_DIR.'qa-app-limits.php';
require_once QA_INCLUDE_DIR.'qa-app-posts.php';

/*
if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../');
		exit;
	}
*/
print '<html>'."\n";
print '<head>'."\n";
print '<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=utf-8">'."\n";
print '</head>'."\n";
print '<body>'."\n";


//$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC; //设置用栏位字符来索引recordset
 
$db = ADONewConnection('ado_access'); 
$access = realpath('./access/duodaa1.mdb'); 
$myDSN = 'PROVIDER=Microsoft.Jet.OLEDB.4.0;'.'DATA SOURCE='. $access . ';'."Jet OLEDB:Database Password=123456;"; 

$db->Connect($myDSN); 
$recordSet = $db->Execute('select * from Question2Answer'); 
//print 'Record Count:';
//print $recordSet->RecordCount();
print '<br />';


if (!$recordSet) 
{print $db->ErrorMsg();} 
else {
print 'Record Count:';
print $recordSet->RecordCount();
print '<br />';


print '<table>'."\n";
while (!$recordSet->EOF) {

//$un = qa_post_text($recordSet->fields['username']);
//if($un=='')$un='Null';
$un1 = $recordSet->fields[0];
$asker = iconv("GBK","UTF-8",$un1);
//$un=(mb_convert_encoding($un,"utf-8", "HTML-ENTITIES"));
//$un=qa_post_text(iconv("GB2312","UTF-8",$un));

$newAskerId = qa_handles_to_userids(array($asker))[$asker];

$un2 = $recordSet->fields[1];
$doner = iconv("GBK","UTF-8",$un2);

$newDonerId = qa_handles_to_userids(array($doner))[$doner];

$un3 = $recordSet->fields[2];
$qtitle = iconv("GBK","UTF-8",$un3);

$un4 = $recordSet->fields[3];
$qcontent = iconv("GBK","UTF-8",$un4);

$un5 = $recordSet->fields[4];
$acontent = iconv("GBK","UTF-8",$un5);


//qa_limits_increment(null, QA_LIMIT_REGISTRATIONS);

/*
$errors=array_merge(
				qa_handle_email_filter($un, $em)
				//qa_password_validate($inpassword)
			);
if(empty($errors))
{$new_id = qa_create_new_user($em, $pw, $un);}
else
{$new_id =-1; }
//$new_uid = 
/*
if($un=='我为高数狂123')$new_id =1;
else $new_id=0;
*/


//print '<tr><td>'.$asker.'_'.$newAskerId[$asker].'</td><td>'.$doner.'_'.$newDonerId[$doner].'</td><td> '.$qtitle.'</td><td> '.$qcontent.'</td><td>'.$acontent.'</td></tr>'."\n"; 
//print $asker.','.$doner.','.$newAskerId.','.$newDonerId.','.$qtitle.','.$qcontent.','.$acontent.'<br />';
$newPostid = qa_post_create('Q',null,$qtitle,$qcontent,'',null,null,$newAskerId );
qa_post_create('A',$newPostid,'',$acontent,'',null,null,$newDonerId );



$recordSet->MoveNext(); 
} 
print '</table>'."\n";
}









print '</body>'."\n";
print '</html>'."\n";

