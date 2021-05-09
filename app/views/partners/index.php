<?php require_once APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<!-- table -->
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">nr</th>
        <th scope="col">Nimi</th>
        <th scope="col">Registri kood</th>
        <th scope="col">E-post</th>
        <th scope="col">Telefon</th>
        <th scope="col">Tegevusala</th>
        <th scope="col">Tegevusala täpsemalt</th>
        <th scope="col">Asukoht</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data['partners'] as $partner): ?>
        <tr>
            <th scope="row"><?php echo $partner->id; ?></th>
            <td><?php echo $partner->name; ?></td>
            <td><?php echo $partner->reg_nr; ?></td>
            <td><?php echo $partner->email; ?></td>
            <td><?php echo $partner->phone; ?></td>
            <td><?php echo $partner->activity; ?></td>
            <td><?php echo $partner->activity_details; ?></td>
            <td><?php echo $partner->location; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<!-- table -->
<?php require_once APPROOT . '/views/inc/footer.php'; ?>
