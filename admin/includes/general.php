<?PHP
/*
   @FUNCTION TO TRUNCATE A STRING
*/
function Truncate ($str, $length, $trailing='...')
   {
      // take off chars for the trailing
      $length-=strlen($trailing);
      if (strlen($str) > $length)
      {
         // string exceeded length, truncate and add trailing dots
         return substr($str,0,$length).$trailing;
      }
      else
      {
         // string was already short enough, return the string
         $res = $str;
      }

      return $res;
   }

// function to trap & display errors
function trapError($err)
 {
    echo " <DIV class=listArea>
            <FIELDSET><LEGEND>Error</LEGEND>
             <table cellpadding=0 cellspacing=3 align=center>
              <tr><td Align=center class=error><b>".$err."</b></td></tr>
             </table>
            </fieldset>
           </div> ";
 }

// Function To Flag
function showFlag()
 {
    $out = "<select name=flag alt=select emsg='Please Select Status'>
             <option value=''> Status </option>
             <option value='Y'> - Active </option>
             <option value='N'> - InActive </option>
            </select>";

    return $out;
 }

function showSelectedFlag($id)
 {
    $out = "<select name=flag alt=select emsg='Please Select Status'>
             <option value=''> Status </option>";

        if ($id == "Y")
         {
           $out .= "<option value='Y' selected> - Active </option>";
         }
        else
         {
           $out .= "<option value='Y'> - Active </option>";
         }

        if ($id == "N")
         {
           $out .= "<option value='N' selected> - InActive </option>";
         }
        else
         {
           $out .= "<option value='N'> - InActive </option>";
         }

        $out .="</select>";

     return $out;
 }
 
// Function To Display on right side - Affiliates
function showsearchdrop()
 {
    $out = "<select name=searchdrop alt=select emsg='Please Select Search Criteria'>
             <option value=''> Select </option>
             <option value='yahoo_category'> - Category Name </option>
             <option value='yahoo_products'> - Product Name </option>
            </select>";

    return $out;
 }
 
function showselectedsearch($id)
 {
    $out = "<select name=searchdrop alt=select emsg='Please Select Search Criteria'>
             <option value=''> Select </option>";

        if ($id == "yahoo_category")
         {
           $out .= "<option value='yahoo_category' selected> - Category Name </option>";
         }
        else
         {
           $out .= "<option value='yahoo_category'> - Category Name </option>";
         }

        if ($id == "yahoo_products")
         {
           $out .= "<option value='yahoo_products' selected> - Product Name </option>";
         }
        else
         {
           $out .= "<option value='yahoo_products'> - Product Name </option>";
         }

        $out .="</select>";

     return $out;
 }

// Function to show all the statistics
function homeStatistics()
 {
   global $db;
   
  // $admins = $db->get_var("select count(*) from yahoo_admin");
  // $categories = $db->get_var("select count(cat_id) from yahoo_category");
  // $products = $db->get_var("select count(product_id) from yahoo_products");

   echo '
       <DIV class=listArea>
       
         <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
          <TBODY>
           <TR>
            <TD>
             <TABLE class=list cellSpacing=2 width="40%" align="center">
              <TBODY>
               
               
               <TR>
                <TD></TD>
               
               </TR>
               
              

              </TBODY>
             </TABLE>
           </TD>
          </TR>
         </TBODY>
        </TABLE>
     
      </DIV>
     <DIV></DIV> ';
 }

// Function To Return Status whether Active Or Inactive
function showStatus($val)
 {
   if ($val == "Y")
    {
       $out = "<font color=darkgreen>Active</font>";
    }
   else
    {
       $out = "<font color=red>Inactive</font>";
    }
   return $out;
 }
 
// Function To Return Display
function showDisp($val)
 {
   if ($val == "Y")
    {
       $out = "<font color=darkgreen>Yes</font>";
    }
   else
    {
       $out = "<font color=red>No</font>";
    }
   return $out;
 }



// This is a generic function to create drop downs from a table
//   function makeDropDown($tableName,$field1,$field2,$selectedField,$nameOfFormElement,$FirstOptionValue)
   function makeDropDown($tname,$f1,$f2,$sel=0,$name,$fvalue)
    {
      global $db;
      $query = "select ".$f1.",".$f2." from ".$tname;
      $result = $db->get_results($query);
      if ($result)
       { // BEGIN OF IF -1
         $out = "<select name='".$name."'>
                 <option value=''>".$fvalue."</option>";
         foreach ($result as $res)
          {
            if ($sel != 0)
             { // BEGIN OF IF - 2
               if ($res->$f1 == $sel)
                { // BEGIN OF IF - 3
                 $out .= "<option value='".$res->$f1."' selected>".$res->$f2."</option>";
                }
               else
                {
                  if (empty($res->$f2))
                   {

                   }
                  else
                   {
                     $out .= "<option value='".$res->$f1."'>".$res->$f2."</option>";
                   }
                } // END OF IF - 3
             }
            else
             {
                  if (empty($res->$f2))
                   {

                   }
                  else
                   {
                     $out .= "<option value='".$res->$f1."'>".$res->$f2."</option>";
                   }
             }  // END OF IF - 2
          } // END OF FOR LOOP
        $out .= "</select>";
      } // END OF IF - 1
     else
      {
        $out = "<select name='".$name."' alt='select' emsg='Please Select ".$name."'>
                 <option value=''>No ".$name."s Found</option>
                </select> ";
      }
     return $out;
  }

?>
