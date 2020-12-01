<div class="container">
    <h2 class="page-title">Vitajte, prihláste sa<span>.</span></h2>  

    <form action="<?php echo '/'.$page_name.'?action=verify'; ?>" method="post">
        <div class="user-type-switch">
            <label class="switch">
                <input type="radio" name="pouzivatel" value="zákazník" checked="checked"/>
                <div class="check-switch"></div>
                <div class="label">zákazník</div>
            </label>
            <label class="switch">
                <input type="radio" name="pouzivatel" value="zamestnanec" />
                <div class="check-switch"></div>
                <div class="label">zamestnanec</div>
            </label>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group col-md-6">
            <label>Heslo:</label>
            <input type="password" class="form-control" name="heslo" placeholder="Heslo" minlength="3" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Prihlásiť sa</button>
    </form>
    <br>
    <?php echo $login_error; ?>

</div>