<?php require_once APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT ?>/partners/index" class="btn btn-info">Tagasi</a>
    <div class="card card-body bg-light mt-5">
        <h2>Lisa partner</h2>
        <p>Lisa partner vormi kaudu</p>
        <form action="<?php echo URLROOT ?>/partners/add/" method="post">
            <div class="form-group">
                <label for="title">Partneri nimi: <sup>*</sup></label>
                <input type="text" name="name"
                       class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                >
                <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="title">Registri number: <sup>*</sup></label>
                <input type="text" name="reg_nr"
                       class="form-control form-control-lg <?php echo (!empty($data['reg_nr_err'])) ? 'is-invalid' : ''; ?>"
                >
                <span class="invalid-feedback"><?php echo $data['reg_nr_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="title">Email: <sup>*</sup></label>
                <input type="text" name="email"
                       class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                >
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="title">Telefoninumber: <sup>*</sup></label>
                <input type="text" name="phone"
                       class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>"
                >
                <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="title">Tegevuse number: <sup>*</sup></label>
                <input type="text" name="act"
                       class="form-control form-control-lg <?php echo (!empty($data['act_err'])) ? 'is-invalid' : ''; ?>"
                >
                <span class="invalid-feedback"><?php echo $data['act_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="title">Asukoht: <sup>*</sup></label>
                <input type="text" name="loc"
                       class="form-control form-control-lg <?php echo (!empty($data['loc_err'])) ? 'is-invalid' : ''; ?>"
                >
                <span class="invalid-feedback"><?php echo $data['loc_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success" value="Lisa">
        </form>
    </div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>