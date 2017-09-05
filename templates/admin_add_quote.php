<div id="add_quote">
    
    <h1 class="page-header">Zitat hinzufügen</h1>
        
    <!-- 2do: form generate -->
    
    <?php
        if($this->_['saved'] == "success") {
    ?>
    <div class="alert alert-success bootstrap-admin-alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Gespeichert</h4>
        Zitat wurde erfolgreich gespeichert.
    </div>
    <?php
        }
        if($this->_['saved'] == "deleted") {
    ?>
    <div class="alert alert-success bootstrap-admin-alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Gelöscht</h4>
        Zitat wurde erfolgreich gelöscht.
    </div>
    <?php
        }
        if($this->_['saved'] == "error") {
    ?>
    <div class="alert alert-danger bootstrap-admin-alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Fehler</h4>
        Beim Speichern ist ein Fehler aufgetretten.
    </div>
    <?php
        }
    ?>
        
    <form action="admin.php" method="post">
        
        <div class="form-group quote">
            <label>Zitat</label>
            <textarea name="quote" class="form-control" rows="3"><?php echo $this->_['quote']['quote']; ?></textarea>
        </div>
        
        <div class="form-group author">
            <label>Author</label>
            <input name="author" class="form-control" value="<?php echo $this->_['quote']['author']; ?>"/>
        </div>
        
        <div class="form-group help">
            <label>Hilfe/Hinweis</label>
            <textarea name="help" class="form-control" rows="2"><?php echo $this->_['quote']['help']; ?></textarea>
        </div>
        
        <div class="form-group date">
            <label>Datum</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                <?php
                    $date =  $this->_['quote']['date'] ?  $this->_['quote']['date'] :  $this->_['latest_quote']['date']; 
                ?>
                <input id="date" name="date" class="form-control datepicker-here" value="<?php echo $date ?>" type='text' placeholder="dd.mm.yyyy" data-position="top left" data-language='de'>
                <div class="left addDays" onclick="addDays('date', 7);">
                    <i class="fa fa-repeat fa-fw"></i>
                    <span class="">+ 7 Tage</span>
                </div>
            </div>
        </div>
        
        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-save"></i> Speichern</button>
        <?php
            // delete button 
            $onclick = "$('#save_quote').val('delete_quote')"; 
            if($this->_['quote']['user_id']){
                echo'<button class="btn btn-default" type="submit" onclick="'.$onclick.'"><i class="glyphicon glyphicon-floppy-remove"></i> Löschen</button>'; 
            }
        ?>
        <input id="save_quote" type=hidden name="action" value="save_quote"/>
        <input type=hidden name="page" value="add_quote"/>
        <input type=hidden name="user_id" value="<?php echo $this->_['quote']['user_id']; ?>"/>
    
    </form>
    
    
        
    
</div>