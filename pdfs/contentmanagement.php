<?PHP
 function addNewsForm()
 {
    global $form;

    echo "<table cellpadding=2 cellspacing=0 width='100%'>
           <tr>
            <td width='80%'>";
      $form->startForm("Add a new News");
	 /* $form->setField(0,'Select Page Name','<select name="page"><option value="">---Select Page---</option><option value="Sub Themes">Sub Themes</option>
<option value="HR Submit Speakers">HR Submit Speakers</option>
<option value="Registration Details">Registration Details</option>
<option value="Sponsorship Opportunities">Sponsorship Opportunities</option>
<option value="Advisory Council">Advisory Council</option>
</select>');*/
	 $form->setField(0,'News Topic','<input type=text name=ntopic size=35>');
	 //$form->setField(0,'Image','<input type=file name=img size=35>');
	  //$form->setField(0,'Venue','<input type=text name=venue size=35>');
     $form->setField(0,'News Detail','<Textarea name=ndetail rows=10 cols=35 alt="length|5|bok" emsg="Please enter news detail"></textarea>');
     $form->setButton(0,"addNews","Add","input2");
     $form->endForm();


    echo "</td>
         <td width='20%' valign=top>";

    //$form->title = " --- ";
   // $form->startLegend();

   // echo " <table cellpadding=0 cellspacing=0 width='100%' class=list>";

    //$form->title = "Existing Index";
   // $form->setTitle();

    //$form->table = "index_magiccategory";
   // $form->f1    = "cat_id";
   // $form->f2    = "cat_name";

  //  echo "<tr><td>";

   // $form->dbSelectMultiple();

  //  echo "</td></tr></table>";

   // $form->endLegend();

    echo "</td></tr></table>";
 }

function editNewsForm($id)
 {
    global $db;
    global $form;
	global $prodpage;
    $query = "select * from news where id='".$id."'";
    $result = $db->get_row($query);
    if ($result)
    {/*
	  if($result->page=='Sub Themes')
	  {
	   $HRThemes ='selected';
	  }
	   if($result->page=='HR Submit Speakers')
	  {
	   $Speakers ='selected';
	  }
	  if($result->page=='Registration Details')
	  {
	   $Registration ='selected';
	  }
	  if($result->page=='Sponsorship Opportunities')
	  {
	   $Sponsorship ='selected';
	  }
	  if($result->page=='Advisory Council')
	  {
	   $Council ='selected';
	  }
	 */
     $form->startForm("Edit News Information ?");
	 /*
	  $form->setField(0,'Select Page Name','<select name="page"><option value="">---Select Page---</option><option value="Sub Themes" '.$HRThemes.'>Sub Themes</option>
<option value="HR Submit Speakers" '.$Speakers.'>HR Submit Speakers</option>
<option value="Registration Details" '.$Registration.'>Registration Details</option>
<option value="Sponsorship Opportunities" '.$Sponsorship.'>Sponsorship Opportunities</option>
<option value="Advisory Council" '.$Council.'>Advisory Council</option>
</select>');
*/
	  $form->sethidden("old_image",$result->img);

	 //$form->setField(0,'Image','<input type=file name=img size=35>');

	 $form->setField(0,'News Topic','<input type=text name=ntopic size=35 value="'.stripslashes($result->topic).'" >');
	  
	//  $form->setField(0,'Venue','<input type=text name=venue value="'.stripslashes($result->venue).'" size=35>');
     $form->setField(0,'News Detail','<Textarea name=ndetail rows=20 cols=35 alt="length|5|bok" emsg="Please enter Index Description">'.stripslashes($result->detail).'</textarea>');
     $form->setButton(1,"updNews","Update","input2");
     $form->endForm();
   }
  else
   {
       $msg = " N ° index exists with this id ";
       $form->error($msg);
   }
 }

function viewNewsIndex($query)
 {
      global $db;
      global $ezr;
      $ezr->num_results_per_page = 20;
      $ezr->num_browse_links = 5;
      $ezr->show_mixed_nav_left= true;
      $ezr->show_num_pages = false;
      $ezr->show_start_page = false;
      $ezr->show_last_page = false;
      $ezr->mixed_nav_left = "<table cellpadding=0 cellspacing=0 width='100%'><tr><td></td><td align=right>News : TOTAL_RESULTS - Viewing page CUR_PAGE of NUM_PAGES </td></tr></table>";
      $ezr->show_count = false;
      $ezr->show_sep1 = false;
      $ezr->show_sep2 = false;
      $ezr->text_next = "Next >>";
      $ezr->text_back = "<< Prev";
      $ezr->style_count = 'font-family: verdana; color: 555555; font-size: 8pt; font-weight: bold;';
      $ezr->set_qs_val("info","news");

      $ezr->results_open = "<DIV class=listArea>
                             <FIELDSET><LEGEND>Displaying News</LEGEND>
                              <TABLE CELLPADDING=3 CELLSPACING=2 WIDTH=100% ALIGN=CENTER>";
      $ezr->results_heading = "<tr>
                                 <th><b>No</b></th>
                                 <th><b>Topic</b></th>
                                 <th><b>Detail</b></th>
								
                               </tr>";
      $ezr->results_row = "<tr bgcolor=ALTCOLOR1>
                            <td>COL1</td>
                            <td>COL2</td>
                            <td>COL3</td>
							 
                           </tr>
                           <tr><td colspan=3 height=1 bgcolor=#F6F6F6></td></tr> ";
      $ezr->results_close = "</table></fieldset></div>";
      $ezr->results_empty = "<DIV class=listArea>
                              <FIELDSET><LEGEND>ERROR</LEGEND>
                               <table cellpadding=0 cellspacing=3 align=center width='100%'>
                                <tr><td Align=center class=error><b> NO News Added Yet !!! </td></tr>
                               </table>
                              </fieldset>
                             </div>";
      $ezr->query_mysql($query);
      $ezr->display();
  }

 function viewNews($query)
  {
      global $db;
      global $ezr;
      $ezr->num_results_per_page = 20;
      $ezr->num_browse_links = 5;
      $ezr->show_mixed_nav_left= true;
      $ezr->show_num_pages = false;
      $ezr->show_start_page = false;
      $ezr->show_last_page = false;
      $ezr->mixed_nav_left = "<table cellpadding=15 cellspacing=0 width='100%'><tr><td></td><td align=right>News :TOTAL_RESULTS - Viewing page CUR_PAGE of NUM_PAGES </td></tr></table>";
      $ezr->show_count = false;
      $ezr->show_sep1 = false;
      $ezr->show_sep2 = false;
      $ezr->text_next = "Next >>";
      $ezr->text_back = "<< Prev";
      $ezr->style_count = 'font-family: verdana; color: 555555; font-size: 8pt; font-weight: bold;';
      $ezr->set_qs_val("info","index");
      $ezr->set_qs_val("action","view");

      $ezr->results_open = "<DIV class=listArea>
                             <FIELDSET><LEGEND>Displaying News</LEGEND>
                              <TABLE CELLPADDING=1 CELLSPACING=2 WIDTH=100% ALIGN=CENTER>";
      $ezr->results_heading = "<tr>
                                 <th><b>No</b></th>
                                 <th><b>Topic</b></th>
                                 <th><b>Detail</b></th>
								 
                                 <th><b>Edit/Delete?</b></th>
                               </tr>";

      $ezr->results_row = "<tr bgcolor=ALTCOLOR1>
                            <td>COL1</td>
                            <td>COL2</td>
                            <td>COL3</td>
							
                            <td align=left>
                             <table cellpadding=2 cellspacing=0>
                               <tr>
                                <td Align=left>
                                 <input type=button name=edit value=' Edit ' class=button onclick=\"linker('admin.php?info=news&action=edit&id=COL1')\">
								 <input type=button name=edit value=' Delete ' class=button onclick=\"linker('admin.php?info=news&action=delete&id=COL1')\">
                                </td>
                                
                               </tr>
                              </table>
                             </td>
                            </tr>";
/*<td align=left>
                                 <input type=button name=delete value='Delete' class=button onclick=\"linker('admin.php?info=index&action=delete&id=COL1')\">
                                </td>*/
      $ezr->results_close = "</table></fieldset></div>";

      $ezr->results_empty = "<DIV class=listArea>
                              <FIELDSET><LEGEND>ERROR</LEGEND>
                               <table cellpadding=0 cellspacing=3 align=center width='100%'>
                                <tr><td Align=center class=error><b>NO INDEX added yet!!! </td></tr>
                               </table>
                              </FIELDSET>
                             </DIV>";
      $ezr->query_mysql($query);
      $ezr->display();
  }

function ConfirmNewsDelete($id)
 {
    global $db;
    global $form;

    $query = "select * from news where id='".$id."'";
    $result = $db->get_row($query);
    if ($result)
     {
       $form->startForm("Delete to confirm the news?");
       $form->setField(1,'Topic',$result->topic);
       $form->setDelButton(0,$id,"news","Delete News?","input2");
       $form->endForm();
     }
    else
     {
       $form->error("Sorry, Not Found.");
     }
 }
 
 //////

//////////////////////////////////////////////TESTIMONIALS////////////////////////////////////////////////////////////////////

 function addTestForm()
 {
    global $form;

    echo "<table cellpadding=2 cellspacing=0 width='100%'>
           <tr>
            <td width='80%'>";
      $form->startForm("Add a new Testimonial");
	 /* $form->setField(0,'Select Page Name','<select name="page"><option value="">---Select Page---</option><option value="Sub Themes">Sub Themes</option>
<option value="HR Submit Speakers">HR Submit Speakers</option>
<option value="Registration Details">Registration Details</option>
<option value="Sponsorship Opportunities">Sponsorship Opportunities</option>
<option value="Advisory Council">Advisory Council</option>
</select>');*/
	 //$form->setField(0,'Image','<input type=file name=img size=35>');
	  //$form->setField(0,'Venue','<input type=text name=venue size=35>');
     $form->setField(0,'Testimonial','<Textarea name=tdetail rows=10 cols=35 alt="length|5|bok" emsg="Please enter news detail"></textarea>');
	 $form->setField(0,'Posted by','<input type=text name=tname size=35>');

     $form->setButton(0,"addTest","Add","input2");
     $form->endForm();


    echo "</td>
         <td width='20%' valign=top>";

    //$form->title = " --- ";
   // $form->startLegend();

   // echo " <table cellpadding=0 cellspacing=0 width='100%' class=list>";

    //$form->title = "Existing Index";
   // $form->setTitle();

    //$form->table = "index_magiccategory";
   // $form->f1    = "cat_id";
   // $form->f2    = "cat_name";

  //  echo "<tr><td>";

   // $form->dbSelectMultiple();

  //  echo "</td></tr></table>";

   // $form->endLegend();

    echo "</td></tr></table>";
 }

function editTestForm($id)
 {
    global $db;
    global $form;
	global $prodpage;
    $query = "select * from testimonials where id='".$id."'";
    $result = $db->get_row($query);
    if ($result)
    {/*
	  if($result->page=='Sub Themes')
	  {
	   $HRThemes ='selected';
	  }
	   if($result->page=='HR Submit Speakers')
	  {
	   $Speakers ='selected';
	  }
	  if($result->page=='Registration Details')
	  {
	   $Registration ='selected';
	  }
	  if($result->page=='Sponsorship Opportunities')
	  {
	   $Sponsorship ='selected';
	  }
	  if($result->page=='Advisory Council')
	  {
	   $Council ='selected';
	  }
	 */
     $form->startForm("Edit Testimonial?");
	 /*
	  $form->setField(0,'Select Page Name','<select name="page"><option value="">---Select Page---</option><option value="Sub Themes" '.$HRThemes.'>Sub Themes</option>
<option value="HR Submit Speakers" '.$Speakers.'>HR Submit Speakers</option>
<option value="Registration Details" '.$Registration.'>Registration Details</option>
<option value="Sponsorship Opportunities" '.$Sponsorship.'>Sponsorship Opportunities</option>
<option value="Advisory Council" '.$Council.'>Advisory Council</option>
</select>');
*/
	  $form->sethidden("old_image",$result->img);

	 //$form->setField(0,'Image','<input type=file name=img size=35>');
	//  $form->setField(0,'Venue','<input type=text name=venue value="'.stripslashes($result->venue).'" size=35>');
     $form->setField(0,'Testimonial','<Textarea name=tdetail rows=20 cols=35 alt="length|5|bok" emsg="Please enter testimonial">'.stripslashes($result->detail).'</textarea>');
	 $form->setField(0,'Posted by','<input type=text name=tname size=35 value="'.stripslashes($result->name).'" >');	 
     $form->setButton(1,"updTest","Update","input2");
     $form->endForm();
   }
  else
   {
       $msg = " N ° index exists with this id ";
       $form->error($msg);
   }
 }

function viewTestIndex($query)
 {
      global $db;
      global $ezr;
      $ezr->num_results_per_page = 20;
      $ezr->num_browse_links = 5;
      $ezr->show_mixed_nav_left= true;
      $ezr->show_num_pages = false;
      $ezr->show_start_page = false;
      $ezr->show_last_page = false;
      $ezr->mixed_nav_left = "<table cellpadding=0 cellspacing=0 width='100%'><tr><td></td><td align=right>News : TOTAL_RESULTS - Viewing page CUR_PAGE of NUM_PAGES </td></tr></table>";
      $ezr->show_count = false;
      $ezr->show_sep1 = false;
      $ezr->show_sep2 = false;
      $ezr->text_next = "Next >>";
      $ezr->text_back = "<< Prev";
      $ezr->style_count = 'font-family: verdana; color: 555555; font-size: 8pt; font-weight: bold;';
      $ezr->set_qs_val("info","testimonial");

      $ezr->results_open = "<DIV class=listArea>
                             <FIELDSET><LEGEND>Displaying Testimonials</LEGEND>
                              <TABLE CELLPADDING=3 CELLSPACING=2 WIDTH=100% ALIGN=CENTER>";
      $ezr->results_heading = "<tr>
                                 <th><b>No</b></th>
                                 <th><b>Testimonial</b></th>
                                 <th><b>Posted by</b></th>
								
                               </tr>";
      $ezr->results_row = "<tr bgcolor=ALTCOLOR1>
                            <td>COL1</td>
                            <td>COL2</td>
                            <td>COL3</td>
							 
                           </tr>
                           <tr><td colspan=3 height=1 bgcolor=#F6F6F6></td></tr> ";
      $ezr->results_close = "</table></fieldset></div>";
      $ezr->results_empty = "<DIV class=listArea>
                              <FIELDSET><LEGEND>ERROR</LEGEND>
                               <table cellpadding=0 cellspacing=3 align=center width='100%'>
                                <tr><td Align=center class=error><b> NO Testimonial Added Yet !!! </td></tr>
                               </table>
                              </fieldset>
                             </div>";
      $ezr->query_mysql($query);
      $ezr->display();
  }

 function viewTest($query)
  {
      global $db;
      global $ezr;
      $ezr->num_results_per_page = 20;
      $ezr->num_browse_links = 5;
      $ezr->show_mixed_nav_left= true;
      $ezr->show_num_pages = false;
      $ezr->show_start_page = false;
      $ezr->show_last_page = false;
      $ezr->mixed_nav_left = "<table cellpadding=15 cellspacing=0 width='100%'><tr><td></td><td align=right>News :TOTAL_RESULTS - Viewing page CUR_PAGE of NUM_PAGES </td></tr></table>";
      $ezr->show_count = false;
      $ezr->show_sep1 = false;
      $ezr->show_sep2 = false;
      $ezr->text_next = "Next >>";
      $ezr->text_back = "<< Prev";
      $ezr->style_count = 'font-family: verdana; color: 555555; font-size: 8pt; font-weight: bold;';
      $ezr->set_qs_val("info","testimonials");
      $ezr->set_qs_val("action","view");

      $ezr->results_open = "<DIV class=listArea>
                             <FIELDSET><LEGEND>Displaying Testimonial</LEGEND>
                              <TABLE CELLPADDING=1 CELLSPACING=2 WIDTH=100% ALIGN=CENTER>";
      $ezr->results_heading = "<tr>
                                 <th><b>No</b></th>
                                 <th><b>Testimonials</b></th>
                                 <th><b>Posted by</b></th>
								 
                                 <th><b>Edit/Delete?</b></th>
                               </tr>";

      $ezr->results_row = "<tr bgcolor=ALTCOLOR1>
                            <td>COL1</td>
                            <td>COL2</td>
                            <td>COL3</td>
							
                            <td align=left>
                             <table cellpadding=2 cellspacing=0>
                               <tr>
                                <td Align=left>
                                 <input type=button name=edit value=' Edit ' class=button onclick=\"linker('admin.php?info=testimonials&action=edit&id=COL1')\">
								 <input type=button name=edit value=' Delete ' class=button onclick=\"linker('admin.php?info=testimonials&action=delete&id=COL1')\">
                                </td>
                                
                               </tr>
                              </table>
                             </td>
                            </tr>";
/*<td align=left>
                                 <input type=button name=delete value='Delete' class=button onclick=\"linker('admin.php?info=index&action=delete&id=COL1')\">
                                </td>*/
      $ezr->results_close = "</table></fieldset></div>";

      $ezr->results_empty = "<DIV class=listArea>
                              <FIELDSET><LEGEND>ERROR</LEGEND>
                               <table cellpadding=0 cellspacing=3 align=center width='100%'>
                                <tr><td Align=center class=error><b>NO INDEX added yet!!! </td></tr>
                               </table>
                              </FIELDSET>
                             </DIV>";
      $ezr->query_mysql($query);
      $ezr->display();
  }

function ConfirmTestDelete($id)
 {
    global $db;
    global $form;

    $query = "select * from testimonials where id='".$id."'";
    $result = $db->get_row($query);
    if ($result)
     {
       $form->startForm("Delete to confirm the testimonial?");
       $form->setField(1,'Testimonial',$result->detail);
       $form->setField(1,'Posted by',$result->name);
       $form->setDelButton(0,$id,"testimonials","Delete testimonial?","input2");
       $form->endForm();
     }
    else
     {
       $form->error("Sorry, Not Found.");
     }
 }

?>