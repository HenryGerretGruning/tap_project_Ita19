<?php require_once APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<div class="row mb-3">
    <div class="col-md-2"><a href="<?php echo URLROOT ?>/partners/add" class="btn btn-primary">Lisa partner</a></div>

</div>
<!-- table -->
<div class="row mb-3">
Järjekorda panemiseks, vajuta vastava veeru peale!
</div>
<table id ="tabelpartner" class="table table-striped">
    <thead>
    <tr >
        <th scope="col">nr</th>
        <th scope="col" onClick="sortTable(0)">Nimi</th>
        <th scope="col" onClick="sortTable(1)" >Registri kood</th>
        <th scope="col" onClick="sortTable(2)" >E-post</th>
        <th scope="col" onClick="sortTable(3)" >Telefon</th>
        <th scope="col" onClick="sortTable(4)" >Tegevusala</th>
        <th scope="col" onClick="sortTable(5)" >Asukoht</th>
        <th scope="col" >Detailne info</th>
    </tr >
    </thead>
    <tbody  >
    <?php
            foreach ($data['partners'] as $partner):?>
        <tr id="sorting" >
            <th  scope="row"><?php echo $partner->partner_id; ?></th>
            <td><?php echo $partner->partner_name; ?></td>
            <td><?php echo $partner->reg_nr; ?></td>
            <td><?php echo $partner->email; ?></td>
            <td><?php echo $partner->phone; ?></td>
            <td><?php echo $partner->partner_activity; ?></td>
            <td><?php echo $partner->location; ?></td>
            <td><a href="<?php echo URLROOT . '/partners/show/' . $partner->partner_id; ?>">Vaata</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<!-- table -->
<?php require_once APPROOT . '/views/inc/footer.php'; ?>

<script>
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("tabelpartner");
        switching = true;
        //Set the sorting direction to ascending:
        dir = "asc";
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /*check if the two rows should switch place,
                based on the direction, asc or desc:*/
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch= true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                //Each time a switch is done, increase this count by 1:
                switchcount ++;
            } else {
                /*If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again.*/
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>