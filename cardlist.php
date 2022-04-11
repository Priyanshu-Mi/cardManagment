<?php 
	include 'inc/header.php';
	include 'inc/sidebar.php';
	include('classes/card.php');


	$card = new carddetail();

	if (isset($_GET['delCard'])) {
		$id = $_GET['delCard'];
		$delCard = $card->delCardByID($id);
	}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>CardDetails List</h2>
                <div class="block"> 
                <?php 
                if (isset($delCard)) {
                	echo $delCard;;
                }
                ?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SNo.</th>
							<th>CardType</th>
							<th>CardNumber</th>
							<th>CardHolder</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						 $getCard = $card->getAllCard();
						 if ($getCard) {
						 	$i=0;
						 	while ($result = $getCard->fetch_assoc()) {
						 		$i++;
						 ?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['cardName']; ?></td>
								<td><?php echo $result['cardNumber']; ?></td>
								<td><?php echo $result['CardHolder']; ?></td>
								<td><a href="cardedit.php?cardId=<?php echo $result['cardId']; ?>">Edit</a> || 
								<a onclick="return confirm('Are you sure to delete?')" href="?delCard=<?php echo $result['cardId']; ?>">Delete</a></td>
							</tr>
						<?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

