<?php
require('admin/sql.php');
session_start();
$_SESSION['rvsstate']=$_REQUEST['state'];
?>
<select name="vcity" id="vcity">
                            <option value="">Select City</option>
                            <?php
									$getcn=mysql_query("select * from city where state='".$_SESSION['rvsstate']."' order by name asc");
									while($getcn1=mysql_fetch_object($getcn))
									{
										if($_REQUEST['city']==$getcn1->name)
										{
											echo '<option value="'.$getcn1->name.'" selected="selected">'.$getcn1->name.'</option>';
										}
										else
										{
											echo '<option value="'.$getcn1->name.'">'.$getcn1->name.'</option>';
										}
									}
									?>
                          </select>
