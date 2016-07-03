<div id="event_selection">
	
	<form id="form_change_event" action="" method="GET">
		<?php
			echo 'Event-Auswahl: <select  id="event" type="text" name="event_selection" size="1">';
			$res_event = mysqli_query($db,"SELECT * FROM event order by event_id desc;");
           
			while($row = mysqli_fetch_array($res_event))
			{
				if($row['event_id'] == $_SESSION['event'])
				{
					echo '<option value="'.$row['event_id'].'" selected>'.$row['event_name'].'</option>';
				}
				else
				{
					echo '<option value="'.$row['event_id'].'">'.$row['event_name'].'</option>';
				}		
			}	
			echo '</select><br>';
		?>
			
		<input id="event_selection_button" type="submit" name="submit_event_selection" value="Speichern"/>
	</form>
	
</div>

<?php
	if(isset($_GET['submit_event_selection']))
	{
		$_SESSION['event'] = $_GET['event_selection'];
	}
?>

