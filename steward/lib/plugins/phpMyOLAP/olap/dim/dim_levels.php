<?php

include("../../config.php");
$xml=simplexml_load_file($xmlfile);

$tabella=$_GET["tabella"];
$colonna=$_GET["colonna"];
$cubename_sel=$_GET["cubename"];

//print "$cubename_sel.$tabella.$colonna<br>";

foreach($xml->Cube as $cube)
{
  $cubename=$cube['name'];
  if($cubename==$cubename_sel)
  {
    //print "CUB $cubename<br>";
    foreach($cube->DimensionUsage as $dimension)
    {
      $dimensionname1=$dimension['name'];
      //print "DIM CUB $dimensionname1<br>";
      foreach($xml->Dimension as $dimension_drill)
      {
        $dimension_drill_name=$dimension_drill['name'];
        //print "DIM $dimension_drill_name<br>";
        $a1=strcmp($dimensionname1,$dimension_drill_name);
        //print "CFR $dimensionname1--$dimension_drill_name--$a1<br>";
        if($a1==0)
        { 
          //print "FOUND DIM $dimensionname1 = $dimension_drill_name<br>";
          foreach($dimension_drill->Hierarchy as $hier_drill)
          {
            $hier_drill_name=$hier_drill['name'];
            //print "HIER $hier_drill_name<br>";
            $table2=$hier_drill->Table;
            $table2_name=$table2["name"];
            foreach($hier_drill->Level as $level_drill)
            {
              $level_drill_name=$level_drill['name'];
              //print "LEV $hier_drill_name.$level_drill_name<br>";
              $t=$level_drill['table'];
              //if($t=="") $t=$table2_name;
              if($t!="")
              $level_drill_table=$level_drill['table'];
              else
              $level_drill_table=$table2_name;
              //print "$t<br>";
              $level_drill_column=$level_drill['column'];
              //print "$t.$level_drill_column<br>"; 
              $a=strcmp($level_drill_table,$tabella);
              $b=strcmp($level_drill_column,$colonna);
              //print "$level_drill_table=$tabella ** $level_drill_column=$colonna<br>";
              if($a==0 and $b==0)
              {
                $dim_found=$dimension_drill_name;
                $hier_found=$hier_drill_name;
                $level_found=$level_drill_name;
                //print "F $dim_found $hier_found $level_found<br>";
}}}}}}}}


print "<select size=6 style='width:150px' name='level_cd' id='level_cd'>";

foreach($xml->Cube as $cube)
{
$cubename=$cube['name'];
if($cubename==$cubename_sel)
{
foreach($cube->DimensionUsage as $dimension)
{
$dimensionname1=$dimension['name'];
foreach($xml->Dimension as $dimension_drill)
{
$dimension_drill_name=$dimension_drill['name'];
//$a1=strcmp($dimensionname1,$dim_found);
$a2=strcmp($dimensionname1,$dimension_drill_name);
if($a2==0)
{
    //first hier first level first prop
    $hier_drill=$dimension_drill->Hierarchy;
    $hier_drill_name=$hier_drill["name"];
    $l1=$hier_drill->Level;
    $level_drill_name=$l1['name'];
    $first_property=$l1->Property;
    $fp=$first_property['name'];
    $valore_opt="$dimension_drill_name.$hier_drill_name.$level_drill_name.$fp";
        if($dimension_drill_name==$dim_found)        
          print "<option selected value='$valore_opt'>$dimension_drill_name</option>";
        else
          print "<option value='$valore_opt'>$dimension_drill_name</option>"; //onclick='alert(\"$valore_opt\")'
}}}}}

print "</select>";

print "<input type='hidden' name='level_found_cd' id='hidden_level_found_cd' value=\"$level_found\">";



?>
