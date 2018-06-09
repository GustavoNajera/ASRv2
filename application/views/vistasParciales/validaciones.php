<?php if (validation_errors()): ?>
    <div class="row red lighten-1 red-text text-lighten-5 marg_1 z-depth-2">
        <div class="col s12">
            <?php echo validation_errors(); ?>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($result)): ?>
    <div class="row green lighten-1 green-text text-lighten-5 marg_1 z-depth-2">
        <div class="col s12">
            <p> <?php echo $result; ?> </p>
        </div>
    </div>
<?php endif; ?>