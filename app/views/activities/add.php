<?php require_once APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT ?>/activities/index" class="btn btn-info">Tagasi</a>
<div class="card card-body bg-light mt-5">
    <h2>Lisa teenus</h2>
    <p>Lisa teenus vormi kaudu</p>
    <form action="<?php echo URLROOT ?>/activities/add/" method="post">
        <div class="form-group">
            <label for="title">Teenuse nimestus: <sup>*</sup></label>
            <input type="text" name="name"
                   class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
            >
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Lisa">
    </form>
</div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>
