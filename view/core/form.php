<form  action="/upload.php" method="post" enctype="multipart/form-data">
    <?php echo bu::lang('formSelectLabel')?> <input type="file" name='img'>
    <br>
    <input type='submit' id='uploadButton' value='<?php echo bu::lang('formSubmitButton')?>'>
</form>
