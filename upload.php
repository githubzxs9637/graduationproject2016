<?php
  include 'store.php';
  $text = $_POST['submit'];
  //echo $text;
  //echo "<br />";
  //$json_text = json_encode($text);
  //$text1 = '{"foo-bar": 12345}';
  $json_string=json_decode($text);
  //echo json_last_error();
  //echo $json_string->{'content'};
  
  
  require_once 'phpanalysis.class.php';
  $pa=new PhpAnalysis();
  $pa->LoadDict();
  //$arr1 = (array)$json_string;
  //$str = iconv('utf-8','gb2312',$arr1['content']);
  $str = $json_string->{'content'};
  $pa->SetSource($str,$source_charset='utf-8', $target_charset='utf-8');
  //$pa->SetSource($str);
  //$pa->resultType=2;
  $pa->differMax=true;
  $pa->StartAnalysis();
  $arr=$pa->GetFinallyResult();
  echo $arr;
  ?>
