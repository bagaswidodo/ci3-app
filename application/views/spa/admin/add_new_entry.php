<?php echo form_open('add-new-entry');?>
    <p><label>Title</label>
    <input type="text" name="entry_name" size="30" /></p>
 
    <h3>Category</h3>
    <p><?php if( isset($categories) && $categories): foreach($categories as $category): ?>
        <label><input class="checkbox" type="checkbox" name="entry_category[]" value="<?php echo $category->category_id;?>"><?php echo $category->category_name;?></label>
        <?php endforeach; else:?>
        Please add your category first!
        <?php endif; ?>
    </p>
    <p><label>Your Entry: (in html)</label>
    <textarea rows="16" cols="80%" name="entry_body" style="resize:none;"></textarea></p>
 
    <br />    
 
    <input class="button" type="submit" value="Submit"/>
    <input class="button" type="reset" value="Reset"/>    
 
</form>