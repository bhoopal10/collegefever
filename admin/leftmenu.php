<div class="lmenu">
  <table border="0" cellpadding="5" cellspacing="3" width="100%" height="575px">
	<tr>
	  <td align="left" valign="top" class="admintr">
	    <h1><strong>Users</strong></h1>
        <ul>
          <li>
		  <?php
		  $getucnt=mysql_fetch_object(mysql_query("select count(id) stcnt from register order by name asc"));
		  
		  ?> 
		  	<a href="clients.php" class="menulink">Users (<?php echo $getucnt->stcnt; ?>)</a>
		  </li>
        </ul>
         <h1><strong>Dropdowns</strong></h1>
        <ul>
          <li> <a href="college.php" class="menulink">College</a></li>
		  <li> <a href="city.php" class="menulink">City</a></li>
		  <li> <a href="degree.php" class="menulink">Degree</a></li>
          <li><a href="category.php" class="menulink">Category</a></li>
        </ul>
		<h1><strong>Newsletter</strong></h1>
        <ul>
          <li> <a href="newsletter.php" class="menulink">Email ID's</a></li>
        </ul>
		<h1><strong>Events</strong></h1>
        <ul>
          <li> <a href="event.php" class="menulink">Events</a></li>
        </ul>
        <p><a href="logout.php" class="menulink">Logout</a><br />
</p></td>
	</tr>
</table>
</div>
